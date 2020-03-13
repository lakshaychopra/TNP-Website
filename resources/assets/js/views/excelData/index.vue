<template>
  <div>
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Excel</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/home">Home</router-link>
          </li>
          <li class="breadcrumb-item active">Excel</li>
        </ol>
      </div>
      <div class="col-md-6 col-8 align-self-right text-right" v-show="excel_added">
        <button class="btn btn-primary" @click="mail">Mail</button>
        <button class="btn btn-primary" @click="download">Download</button>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Excel Data</h4>
            <i v-if="loading" class="fa fa-spinner fa-spin fa-4x text-center"></i>
            <form @submit.prevent="storeTask" v-else>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for>
                      Excel
                      <span class="input-required text-danger">*</span>
                    </label>
                    <input
                      type="file"
                      class="form-control"
                      v-validate="'required|mimes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'"
                      ref="file"
                      name="file"
                      id="imageUrl"
                      @change="handleChange"
                    />
                    <small class="text-danger">{{ errors.first('file') }}</small>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
                <span v-if="!load">Save</span>
                <span v-else>
                  <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                </span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import helper from "../../services/helper";
import { downloadExcelURL } from "../../config.js";
import { mailExcelURL } from "../../config.js";
import { apiDomain } from "../../config.js";
export default {
  data() {
    return {
      loading: false,
      excel_added: false,
      user: {
        file: "",
        type: ""
      },
      load: false
    };
  },
  methods: {
    mail() {
      axios
        .post(mailExcelURL)
        .then(function(response) {
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    },
    download() {
      //  axios.get(downloadExcelURL)
      //     .then(function(response) {
      //     console.log(response);
      // })
      // .catch(error => {
      //     console.log(error);
      // });

      //  var url = apiDomain + downloadExcelURL;
      //  window.open(url, '_blank');

      axios({
        url: apiDomain + downloadExcelURL,
        method: "GET",
        responseType: "blob" // important
      }).then(response => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", "user.xlsx");
        document.body.appendChild(link);
        link.click();
      });
    },
    handleChange(e) {
      this.user.file = e.target.files[0];
      console.log(this.user.file);
    },
    storeTask() {
      let fileUpload = this.user.file;
      let u = this;
      this.$validator.validateAll().then(result => {
        if (result) {
          var reader = new FileReader();
          reader.onload = (function(fileUpload) {
            return function(e) {
              let table = [];
              let rows = e.target.result.split("\n");
              for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].split(",");
                if (cells.length > 1) {
                  table.push({
                    URN: cells[0],
                    CRN: cells[1],
                  });
                }
              }
              u.load = true;
              let dat = { f: table };
              axios
                .post("/api/dashboard/data_excel", dat)
                .then(function(response) {
                  toastr["success"](response);
                  // this.$emit('completed',response.task)
                  u.load = false;
                  u.excel_added = true;
                  // console.log(this.loading);
                  console.log(response);
                })
                .catch(response => {
                  // this.loading = false;
                  //   u.load = false;

                  //   u.excel_added = true;
                  console.log(u.loading);
                  toastr["error"](response.message);
                });
            };
          })(fileUpload);
          reader.readAsText(fileUpload);
        }
      });
    }
  }
};
</script>

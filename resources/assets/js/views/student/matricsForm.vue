<template>
  <div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-material card">
          <div class="card-body">
            <h2 class="card-title mt-3 text-primary">Matriculation Education Details</h2>

            <form method="post" @submit.prevent="validateForm" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="board" :class="{'form-control': true, 'error': errors.has('board')}" v-model="student.board"
                      v-validate="'required'">
                      <!-- <option disabled value="">HOSTELER / DAY SCHOLAR</option> -->
                      <option value="CBSE">CBSE</option>
                      <option value="ICSE"> ICSE </option>
                      <option value="PSEB">PSEB</option>
                      <option value="BSEB">BSEB</option>

                    </select>
                    <!-- <input v-validate="'required'" type="text" name="board" v-model="student.board" placeholder="Board" class="form-control text-uppercase"> -->
                    <small class="form-text text-primary text-uppercase">Board
                      <span class="text-danger pull-right">{{errors.first('board')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input v-validate="'required'" type="text" name="institute name" v-model="student.institute" placeholder="Institute Name"
                      class="form-control text-capitalize">
                    <small class="form-text text-primary text-uppercase">Institute Name
                      <span class="text-danger pull-right">{{errors.first('institute name')}}</span>
                    </small>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <input v-validate="'required'" type="month" name="Month and Year of Passing" v-model="monthYear" placeholder="Month" class="form-control"
                      v-on:change="splitMonthYear(monthYear)">
                    <small class="form-text text-primary text-uppercase">Month and Year of Passing
                      <span class="text-danger pull-right">{{errors.first('Month and Year of Passing')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-md-2 col-form-label">Marks Type : </label>
                    <div class="col-md-2 md-radio md-radio-inline">
                      <input v-validate="'required'" type="radio" name="marks_type" id="CGPA" v-model="student.marks_type" value="CGPA"
                        v-on:change="resetmarks()">
                      <label for="CGPA">CGPA</label>
                    </div>
                    <div class="col-md-2 md-radio md-radio-inline">
                      <input type="radio" name="marks_type" id="PERCENTAGE" v-model="student.marks_type" value="PERCENTAGE"
                        v-on:change="resetmarks()">
                      <label for="PERCENTAGE">PERCENTAGE</label>
                    </div>
                      <span class="text-danger pull-right">{{errors.first('marks type')}}</span>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <input v-validate="'required'" type="number" name="obtained marks" v-model="student.obtained_marks"
                      placeholder="Obtained Marks" class="form-control" v-on:input="percentCalculate()" v-if="this.student.marks_type=='CGPA'">
                    <input v-validate="'required'" type="text" name="obtained marks" v-model="student.obtained_marks" placeholder="Obtained Marks"
                      class="form-control" v-on:input="percentCalculate()" v-else>
                    <small class="form-text text-primary text-uppercase">Obtained Marks
                      <span class="text-danger pull-right">{{errors.first('obtained marks')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input v-validate="'required'" type="number" name="max marks" v-model="student.max_marks" class="form-control" placeholder="10"
                      value="10" disabled v-if="this.student.marks_type=='CGPA'">
                    <input v-validate="'required'" type="text" name="max marks" v-model="student.max_marks" placeholder="Max Marks" class="form-control"
                      v-on:input="percentCalculate()" v-else>
                    <span class="small text-primary text-uppercase">Max Marks</span>
                    <span id="percent" class="small text-muted pull-right">Percent = {{ percent }}%
                    </span>
                  </div>
                      <span class="text-danger pull-right">{{errors.first('max marks')}}</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                   <div class="form-group files">
                    <input type="file" v-validate="'required'" accept="application/pdf" class="form-control" ref="file" name="file" id="imageUrl">
                      <small class="form-text text-primary text-uppercase">Upload Scanned Tenth Certificate (.pdf) 
                         <span class="text-danger pull-right">{{errors.first('File')}}</span>
                      </small>

                </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <button class="btn btn-info btn-lg btn-primary pull-right" type="submit" value="I Agree">
                    <span v-if="!load">Submit
                      </span> 
                      <span v-else>
                        <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                      </span> 
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import {
    storeStudentMeURL,
    formstepChangeURL,
    fetchProfileURL
  } from "../../config.js";
  export default {
    data() {
      return {        
        student: {
          marks_type: 'CGPA',
        },
        percent: 0,
        id: this.$parent.id,
        monthYear: '',
        month: '',
        year: '',
        profile: {
          'univ_roll_no': this.$parent.username,
        },
        statusChange: {
          'student_form_step': 'METRICS_EDUCATION',
          'id': this.$parent.id,
        },
        files: {},
        certificate: '',
        load:false
      };
    
    },
    created() {
      axios.get('/api/dashboard/student/me/' + this.$parent.username + '/edit').then(response => {
        console.log(response.data.data[0]);
        this.student = response.data.data[0];
        this.monthYear = response.data.data[0].year + '-' + response.data.data[0].month;
        this.percent = response.data.data[0].percentage;
      }).catch(error => {
        console.log(error);
      });
    },
    methods: {
      resetmarks() {
        this.percent = 0;
        this.student.obtained_marks = undefined;
        if (this.student.marks_type == 'CGPA') {
          this.student.max_marks = 10;
        } else {
          this.student.max_marks = undefined;
        }
      },
      validateForm() {
        this.$validator.validateAll().then((result) => {
          if (result) {
            this.submit();
          }
          else{
            alert('Please enter missing details.');
          }
        });
      },
      percentCalculate() {
        if (this.student.marks_type == 'CGPA') {
          console.log(this.student.max_marks);
          if (this.student.obtained_marks != undefined && (this.student.max_marks != undefined || this.student
              .max_marks != '')) {
            this.percent = parseFloat(this.student.obtained_marks * 9.5).toFixed(3);
          } else {
            this.percent = 0;
          }
        } else {
          if (this.student.obtained_marks != undefined && this.student.max_marks != undefined) {
            this.percent = parseFloat((this.student.obtained_marks / this.student.max_marks) * 100).toFixed(
              3);
          } else {
            this.percent = 0;
          }

        }
      },
      getAuthUser(name) {
        return this.$store.getters.getAuthUser(name);
      },
      splitMonthYear(monthYear) {
        this.student.month = monthYear.split('-')[1];
        this.student.year = monthYear.split('-')[0];
      },
        //  handleChange(e) {
        //     imagefile = document.querySelector('#file');
        //         this.certificate = e.files[0];
        //         //this.img_preview = URL.createObjectURL(this.post.imageUrl);

        //         console.log(this.certificate);
        //     },

      submit() {
        this.load=true;
        let formData = new FormData();
        formData.append('univ_roll_no', this.student.univ_roll_no);
        formData.append('board', this.student.board.toUpperCase());
        formData.append('institute', this.student.institute.toUpperCase());
        formData.append('month', this.student.month);
        formData.append('year', this.student.year);
        formData.append('obtained_marks', this.student.obtained_marks);
        formData.append('max_marks', this.student.max_marks);
        formData.append('marks_type', this.student.marks_type);
        formData.append('percentage', this.percent);
        var imagefile = document.querySelector('#imageUrl');
        console.log(imagefile.files[0]);
        formData.append('tenth_certificate', imagefile.files[0]);
        //formData.append('tenth_certificate', this.certificate);
        formData.append('_method', 'PUT');
        console.log(this.student.month);
        console.log(this.student.year);
        // console.log(this.$store.state.auth.username);
        // console.log('1');
        axios.post(storeStudentMeURL + this.student.id, formData,{headers: {'Content-Type': 'multipart/form-data'}}
        ).then(response => {
          console.log(response);
          axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {
            if (statusresponse.status == 200) {
              // toastr['success']("User Added!!");
              this.$parent.step = 4;
              // this.$router.push('/req');

            }
          }).catch(errors => {
            console.log(errors);
          });
          //  if (response.status == 200) {
          // }
        }).catch(error => {
          console.log(error);
        });
      }
    }
  }

</script>
<style scoped>
  .text-primary {
    color: #0185c2 !important;
  }

  .col-form-label {
    padding-left: 0;
  }

</style>
<style lang="scss" scoped>
  $md-radio-checked-color: rgb(51, 122, 183);
  $md-radio-border-color: rgba(0, 0, 0, 0.54);
  $md-radio-size: 20px;
  $md-radio-checked-size: 10px;
  $md-radio-ripple-size: 15px;

  @keyframes ripple {
    0% {
      box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.0);
    }

    50% {
      box-shadow: 0px 0px 0px $md-radio-ripple-size rgba(0, 0, 0, 0.1);
    }

    100% {
      box-shadow: 0px 0px 0px $md-radio-ripple-size rgba(0, 0, 0, 0);
    }
  }

  .md-radio {
    margin: 16px 0;

    &.md-radio-inline {
      display: inline-block;
    }

    input[type="radio"] {
      display: none;

      &:checked+label:before {
        border-color: $md-radio-checked-color;
        animation: ripple 0.2s linear forwards;
      }

      &:checked+label:after {
        transform: scale(1);
      }
    }

    label {
      display: inline-block;
      height: $md-radio-size;
      position: relative;
      padding: 0 ($md-radio-size + 10px);
      margin-bottom: 0;
      cursor: pointer;
      vertical-align: bottom;

      &:before,
      &:after {
        position: absolute;
        content: '';
        border-radius: 50%;
        transition: all .3s ease;
        transition-property: transform, border-color;
      }

      &:before {
        left: 0;
        top: 0;
        width: $md-radio-size;
        height: $md-radio-size;
        border: 2px solid $md-radio-border-color;
      }

      &:after {
        top: $md-radio-size / 2 - $md-radio-checked-size / 2;
        left: $md-radio-size / 2 - $md-radio-checked-size / 2;
        width: $md-radio-checked-size;
        height: $md-radio-checked-size;
        transform: scale(0);
        background: $md-radio-checked-color;
      }
    }
  }

</style>

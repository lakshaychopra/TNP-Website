<template>
  <div class="app-container">
    <el-form :model="user" :rules="rules2" ref="user">
    <input type="hidden" name="_token" :value="csrf">
      <el-form-item label="Category" prop="category">
         <el-select v-model="user.type" clearable placeholder="Category" class="form-control">
          <el-option
            v-for="item in categoryOptions"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
      </el-form-item>

      <el-form-item label="Excel">
       <div class="form-group files">
       <input type="file" class="form-control" ref="file" name="file" id="imageUrl" @change="handleChange">
       </div>
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="handleLoginFormSubmit('user')">Add</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import { addUserURL } from "../../config.js";
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),

        rules2: {
        //   category: [
        //     {required: true, message: 'Please select category', trigger: 'change' }
        //   ],
        },
      user: {
        type: '',
        file: '', 
      },

      categoryOptions: [{
          value: 'STUDENT',
          label: 'Student'
        }, {
          value: 'COMPANY',
          label: 'Company'
        },
        {
          value: 'EXECUTIVE_MEMBER',
          label: 'Executive Member'
        },
        {
          value: 'MASTER_ADMIN',
          label: 'Master Admin'
        },],
    }
  },
  methods: {
    handleChange(e) {
      // var file =e.target.files[0];
      // this.post.imageUrl = URL.createObjectURL(file);
      this.user.file = e.target.files[0];
      console.log(this.user.file);
      // this.post.imageUrl =this.$refs.file.files[0];
      // console.log(this.post.imageUrl);
},
    handleLoginFormSubmit(formName) {
      this.$refs[formName].validate((valid) => {
          if (valid) {
      let formData = new FormData();
      formData.append('excel', this.user.file);
      formData.append('type', this.user.type);
      console.log(this.user.type)
      axios.post('/admin/user',formData, {headers: {'Content-Type': 'multipart/form-data'}})
        .then(function(response) {
          console.log(response);
          // if (response.status == "200") {
          //   // window.location = "/dashboard";
          //     router.push({name:'security'});

          // }
          // if (response.status == "401") {
          //   }
          

        })
        .catch(function(error) {
          var obj = JSON.parse(error.response.request.responseText);
          console.log(obj);
        //     // console.log(error.response);
          if(error.response.status=="422"){
            // console.log(obj['error']);
             if(obj['errors'].hasOwnProperty('image')){
                Vue.toasted.show(obj['errors']['image'],{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 10000
              })
              }
            if(obj['errors'].hasOwnProperty('title')){
                Vue.toasted.show(obj['errors']['title'],{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 10000
              })
              }
            if(obj['errors'].hasOwnProperty('tags')){
                Vue.toasted.show(obj['errors']['tags'],{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 10000
              })
              }
              if(obj['errors'].hasOwnProperty('category')){
                Vue.toasted.show(obj['errors']['category'],{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 10000
              })
              }
               if(obj['errors'].hasOwnProperty('body')){
                Vue.toasted.show(obj['errors']['body'],{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 10000
              })
              }
         }
          console.log(error);
        });

          } else {
            console.log('error submit!!');
            return false;
          }
        });
     
    },
    // onSubmit() {
    //   // this.$message('submit!')
    //   console.log(content)
    // },
    // onCancel() {
    //   this.$message({
    //     message: 'cancel!',
    //     type: 'warning'
    //   })
    // }
  }
}
</script>

<style scoped>
.line{
  text-align: center;
}
 .files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
/* .files img{
  height :100px;
  width:100px;
} */
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}
.vue-tags-input[data-v-36b6250a]{
  max-width: 100%;
}
</style>


<template>
  <div class="app-container">
    <el-form :model="post" :rules="rules2" ref="post">
    <input type="hidden" name="_token" :value="csrf">
      <el-form-item label="Title" prop="title" >
        <el-input v-model="post.title" placeholder="Title"></el-input>
      </el-form-item>
      <el-form-item label="Body">
        <!-- <el-select v-model="form.region" placeholder="please select your zone">
          <el-option label="Zone one" value="shanghai"></el-option>
          <el-option label="Zone two" value="beijing"></el-option>
        </el-select> -->

      <vue-html5-editor class="form-control" :content="post.content" :height="300" :auto-height="true"  @change="updateData"></vue-html5-editor>
      </el-form-item>

       <!-- <trumbowyg v-model="myHTML" class="form-control"></trumbowyg> -->
      <!-- <wysiwyg v-model="myHTML" /> -->
      <el-form-item label="Tags">
            <vue-tags-input class="form-control"
              v-model="post.tag"
              :tags="post.tags"
              :validation="validation"
              @tags-changed="newTags => tags = newTags"
            />
      </el-form-item>
            <!-- <el-select class="form-control"
                v-model="post.tags"
                multiple
                filterable
                allow-create
                placeholder=""
                >
                <el-option
                  v-for="item in tagsOptions"
                  :key="item.value"
                  :label="item.label"
                  :value="item.value">
                </el-option>
              </el-select> -->
        
        <!-- <el-col :span="11">
          <el-date-picker type="date" placeholder="Pick a date" v-model="post.date1" style="width: 100%;"></el-date-picker>
        </el-col> -->
        <!-- <el-col class="line" :span="2">-</el-col> -->
        <!-- <el-col :span="11"> -->
          <!-- <el-time-picker type="fixed-time" placeholder="Pick a time" v-model="post.date2" style="width: 100%;"></el-time-picker> -->
        <!-- </el-col> -->
      <el-form-item label="Category" prop="category">
        <!-- <el-switch v-model="post.delivery"></el-switch> -->
         <el-select v-model="post.category" clearable placeholder="Category" class="form-control">
          <el-option
            v-for="item in categoryOptions"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="Image">
        <!-- <el-checkbox-group v-model="post.type">
          <el-checkbox label="Online activities" name="type"></el-checkbox>
          <el-checkbox label="Promotion activities" name="type"></el-checkbox>
          <el-checkbox label="Offline activities" name="type"></el-checkbox>
          <el-checkbox label="Simple brand exposure" name="type"></el-checkbox>
        </el-checkbox-group> -->
       <div class="form-group files">
       <!-- <img :src="post.imageUrl" alt="Image"> -->
       <input type="file" class="form-control" ref="file" name="file" id="imageUrl" @change="handleChange">
      
       </div>
      </el-form-item>

      <!-- <el-form-item label="Resources">
        <el-radio-group v-model="post.resource">
          <el-radio label="Sponsor"></el-radio>
          <el-radio label="Venue"></el-radio>
        </el-radio-group>
      </el-form-item>
      <el-form-item label="Activity form">
        <el-input type="textarea" v-model="post.desc"></el-input>
      </el-form-item> -->
      <el-form-item>
        <el-button type="primary" @click="handleLoginFormSubmit('post')">Add</el-button>
        <el-button @click="onCancel">Cancel</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import { addPostURL } from "../../config.js";
import VueTagsInput from '@johmun/vue-tags-input';
export default {
   components: {
    VueTagsInput,
  },
  data() {
      var validateFields = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the title'));
        }
      validation: [{
      type: 'min-length',
      rule: /^.{8,}$/,
    }]

}
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),

        rules2: {
         title: [
            {required: true, message: 'Please input title', trigger: 'change' }
          ],
        //  tags: [
        //     {required: true, message: 'Please input tags', trigger: 'change' }
        //   ],
          category: [
            {required: true, message: 'Please select category', trigger: 'change' }
          ],
        },
      post: {
        title: '',
        region: '',
        date1: '',
        date2: '',
        delivery: false,
        type: [],
        resource: '',
        desc: '',
        content:'',
         tag: '',
        tags: ['gndec','tnp'],
        category: '' ,
        imageUrl: ''
 
      },
      tagsOptions: [{
          value: '',
          label: ''
        }],

      categoryOptions: [{
          value: 'Internship',
          label: 'Internship'
        }, {
          value: 'Placement',
          label: 'Placement'
        }],
    }
  },
  methods: {
    updateData: function (data) {
        this.post.content = data
    },
    handleChange(e) {
      // let image = e.target.files[0];
      // let reader = new FileReader();
      // reader.readAsDataURL(image);
      // reader.onload = e =>{
      //   this.post.imageUrl = e.target.result
      //   // console.log(e)
      // }
      this.post.imageUrl =this.$refs.file.files[0];
      console.log(this.post.imageUrl);
},
    handleLoginFormSubmit(formName) {
      this.$refs[formName].validate((valid) => {
          if (valid) {
             const postData = {
        // usertype : 'EXECUTIVE_MEMBER',
        title: this.post.title,
        body: this.post.content,
        author:'admin',
        author_id: '1',
        tag:this.post.tags.toString(),
        post_link:'abc',
        category:this.post.category,
        image_path:this.post.imageUrl
      };
      let formData = new FormData();
      formData.append('image_path', postData.image_path);
      formData.append('title', postData.title);
      formData.append('body', postData.body);
      formData.append('author', postData.author);
      formData.append('author_id', postData.author_id);
      formData.append('tag', postData.tag);
      formData.append('category', postData.category);
      formData.append('post_link', postData.post_link);
      axios.post(addPostURL,formData, {headers: {'Content-Type': 'multipart/form-data'}})
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
             if(obj['errors'].hasOwnProperty('image_path')){
                Vue.toasted.show(obj['errors']['image_path'],{
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
         
        //   if(error.response.status=="422"){
        //     // console.log(obj['errors']['username']);
        //     if(obj['errors'].hasOwnProperty('username')){
        //         Vue.toasted.show(obj['errors']['username'],{
        //         icon : 'exclamation-circle',
        //         position: "bottom-center", 
        //         duration : 10000
        //       })
        //     }
        //     if (obj['errors'].hasOwnProperty('password')) {
        //         Vue.toasted.show(obj['errors']['password'],{
        //         icon : 'exclamation-circle',
        //         position: "bottom-center", 
        //         duration : 10000
        //       })
        //     }

            
          // }
          console.log(error);
        });

          } else {
            console.log('error submit!!');
            return false;
          }
        });
     
    },
    onSubmit() {
      // this.$message('submit!')
      console.log(content)
    },
    onCancel() {
      this.$message({
        message: 'cancel!',
        type: 'warning'
      })
    }
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


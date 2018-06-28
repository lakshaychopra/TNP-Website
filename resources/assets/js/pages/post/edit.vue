<template>
      <div class="app-container" id="editPost">
    <el-form :model="post" :rules="rules2" ref="post">
    <input type="hidden" name="_token" :value="csrf">
      <el-form-item label="Title" prop="title" >
        <el-input v-model="rec.title" placeholder="Title"> </el-input>
      </el-form-item>
      
      <el-form-item label="Body">
      <vue-html5-editor class="form-control" :content="rec.content" :height="300" :auto-height="true"  @change="updateData"></vue-html5-editor>
      </el-form-item>

      <el-form-item label="Tags" class="form-control">
            <vue-tags-input 
              v-model="post.tag"
              :tags="tag"
              :validation="validation"
              @tags-changed="newTags => post.tags = newTags"
            />
      </el-form-item>
           
      <el-form-item label="Category" prop="category">
        <!-- <el-switch v-model="post.delivery"></el-switch> -->
         <el-select v-model="rec.category" clearable placeholder="Category" class="form-control">
          <el-option
            v-for="item in categoryOptions"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
      </el-form-item>
     
      <el-form-item label="Image">
       <div class="form-group files">
       <!-- <img :src="post.imageUrl" alt="Image"> -->
       <input type="file" class="form-control" ref="file" name="file" id="imageUrl" @change="handleChange">
       </div>
      </el-form-item>

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
    props: ['rec'],
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
        tag:this.rec.tag.split(','),
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
        imageUrl: '',
        tags_submit:[],
 
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
      mounted(){
       // console.log(rec.tag.split(','));
      },
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
      for (let i = 0; i < this.post.tags.length; i++){
      this.post.tags_submit.push(this.post.tags[i].text);
      }
             const postData = {
        // usertype : 'EXECUTIVE_MEMBER',
        title: this.post.title,
        body: this.post.content,
        username:'admin',
        user_id: '1',
        tag:this.post.tags_submit.toString(),
        post_link:'abc',
        category:this.post.category,
        image:this.post.imageUrl
      };
      let formData = new FormData();
      formData.append('image', postData.image);
      formData.append('title', postData.title);
      formData.append('body', postData.body);
      formData.append('username', postData.username);
      formData.append('user_id', postData.user_id);
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

</style>

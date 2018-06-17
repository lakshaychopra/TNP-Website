<template>
  <div class="app-container">
    <el-form ref="form" :model="post" label-width="120px">
    <input type="hidden" name="_token" :value="csrf">
      <el-form-item label="Title">
        <el-input v-model="post.title"></el-input>
      </el-form-item>
      <el-form-item label="Body">
        <!-- <el-select v-model="form.region" placeholder="please select your zone">
          <el-option label="Zone one" value="shanghai"></el-option>
          <el-option label="Zone two" value="beijing"></el-option>
        </el-select> -->

      <vue-html5-editor :content="post.content" :height="300" :auto-height="true"  @change="updateData"></vue-html5-editor>
      </el-form-item>

       <!-- <trumbowyg v-model="myHTML" class="form-control"></trumbowyg> -->
      <!-- <wysiwyg v-model="myHTML" /> -->
      <el-form-item label="Tags">
            <el-select class="form-control"
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
              </el-select>
        
        <!-- <el-col :span="11">
          <el-date-picker type="date" placeholder="Pick a date" v-model="post.date1" style="width: 100%;"></el-date-picker>
        </el-col> -->
        <!-- <el-col class="line" :span="2">-</el-col> -->
        <!-- <el-col :span="11"> -->
          <!-- <el-time-picker type="fixed-time" placeholder="Pick a time" v-model="post.date2" style="width: 100%;"></el-time-picker> -->
        <!-- </el-col> -->
      </el-form-item>
      <el-form-item label="Category">
        <!-- <el-switch v-model="post.delivery"></el-switch> -->
         <el-select v-model="post.category" clearable placeholder="Select" class="form-control">
          <el-option
            v-for="item in categoryOptions"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="Post Image">
        <!-- <el-checkbox-group v-model="post.type">
          <el-checkbox label="Online activities" name="type"></el-checkbox>
          <el-checkbox label="Promotion activities" name="type"></el-checkbox>
          <el-checkbox label="Offline activities" name="type"></el-checkbox>
          <el-checkbox label="Simple brand exposure" name="type"></el-checkbox>
        </el-checkbox-group> -->
       <div class="form-group files">
       <!-- <img :src="post.imageUrl" alt="Image"> -->
       <input type="file" class="form-control" name="postImg" id="postImg" @change="handleChange">
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
        <el-button type="primary" @click="handleLoginFormSubmit">Add</el-button>
        <el-button @click="onCancel">Cancel</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import { addPostURL } from "../../config.js";

export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      
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
        tags: [],
        category: '' ,
        imageUrl: null
 
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
      let image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e =>{
        this.post.imageUrl = e.target.result
        // console.log(e)
      }
},
    handleLoginFormSubmit() {
      const postData = {
        // usertype : 'EXECUTIVE_MEMBER',
        title: this.post.title,
        body: this.post.content,
        author:'admin',
        author_id: '1',
        tag:this.post.tags.toString(),
        // post_link:'abc',
        category:this.post.category,
        // image_path:this.post.imageUrl
      };
      axios.post(addPostURL,postData)
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
        //   var obj = JSON.parse(error.response.request.responseText);
          
        //     // console.log(error.response);
        //   if(error.response.status=="401"){
        //     // console.log(obj['error']);
        //      Vue.toasted.show(obj['error'],{
        //         icon : 'exclamation-circle',
        //         position: "bottom-center", 
        //         duration : 10000
        //       })
        //  }
         
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
</style>


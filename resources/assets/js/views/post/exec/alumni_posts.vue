<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Post</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">Alumni Post</li>
                </ol>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Add Alumni's Post</h2>
                        <br>
                <div class="row">
                    <div class="col-md-12">
                        <label>Select Alumni Name</label>
                        <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="alumni_post">
                            <option value="" disabled selected>Choose Alumni</option>
                            <option v-for="post in posts" v-bind:value="post.name" :key="post.name">
                                {{ post.name }}
                            </option>
                        </select>
                    </div>
                    <div class="row" style="margin-left:8px">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10" v-on:click="show_post">
                            <span>Show Post</span>
                        </button>
                    </div>
                        </div>
                </div>
        <br><br>
        <div v-if="show_form">
        <form @submit.prevent="proceed">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title<span class="input-required text-danger">*</span></label>
                    <input v-validate="'required'" class="form-control" type="text"  v-model="title" name="title"
                        autofocus maxlength="50">
                    <small class="text-danger">{{ errors.first('title') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Body</label>
                    <editor v-model="body" :init="{height: 300, paste_as_text: true,
                     toolbar: 'addpdf | placementPost | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link | code | preview | fullscreen',browser_spellcheck: true,preview:true,
                     plugins: 'autolink,fullscreen,insertdatetime,searchreplace,preview,wordcount,paste,table,lists,link,code,addpdf,placementPost' }"></editor>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Category<span class="input-required text-danger">*</span></label>
                    <select v-model="category" class="form-control" v-validate="'required'" name="category">
                        <option value="Internship">Internship</option>
                        <option value="Placement">Placement</option>
                        <option value="Announcement">Announcement</option>
                        <option value="Selected">Selected</option>
                    </select>
                    <small class="text-danger">{{ errors.first('category') }}</small>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Post link</label>
                    <input class="form-control" type="text" value="" v-model="post_link" name="title" autofocus>
                </div>
            </div>
        </div>
                
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
            <span>Save</span>
        </button>
    </form>
    </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>
   import helper from '../../../services/helper'
   import {
        addPostURL,
        postIdGetURL,
        apiDomain
    } from "../../../config.js";
    import Editor from '@tinymce/tinymce-vue';
    require('../../../services/editor/addpdf.js');
    require('../../../services/editor/placementpost.js');
    import InputTag from 'vue-input-tag'

export default {
   props: ['id'],
   components: {
            InputTag,
            'editor': Editor
        },
   
  data() {
    return {
        posts_data: [],
        posts:[],
        show_form:false,
        alumni_post:'',
        alumni:'',
        title:'',
        body:'',
        category:'',
        post_link:'',
        tags: ['gndec', 'tnp'],
        imageUrl: '',
        username: this.$store.getters.getAuthUserFullName,
        user_id: this.$store.getters.getAuthUserId,
        csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),

      post: {
        
        date1: '',
        date2: '',
        delivery: false,
        //type: [],
        resource: '',
        desc: '',
        
      },
      

      categoryOptions: [{
          value: 'Internship',
          label: 'Internship'
        }, {
          value: 'Placement',
          label: 'Placement'
        }],
    }
  },
  created() {
            axios.get('/api/alumni_posts').then(response => {
                this.posts = response.data.data; 
                // for(var $i=0;$i<this.posts_data.length;$i++){
                //  this.posts[$i]=this.posts_data[$i].name;
                // } 
               // this.posts=each(this.posts);
               //console.log(this.posts);
                }).catch(error => {
                console.log(error.response);
              });
  },
  methods: {
      show_post(){
                let formData = new FormData();
                formData.append('name', this.alumni_post);
                formData.append('_method', 'POST');
                axios.post('/api/show_alumni_post', formData).then(response => {
                     this.show_form=true;
                     this.alumni=response.data[0];
                     this.title=this.alumni.job_title;
                     this.body="Job Description : "+this.alumni.job_des+ 
                               "\nTechnical Requirment : "+this.alumni.tech_req+
                               "\nJob Location : "+this.alumni.job_location+
                               "\nSalary : "+this.alumni.salary+
                               "\nVacancy : "+this.alumni.vacancy;
                     this.category=this.alumni.category;
                     this.post_link=this.alumni.post_link;
                }).catch(error => {
                console.log(error.response);
              });
      },
    proceed() {
      let formData = new FormData();
      formData.append('image', this.imageUrl);
      formData.append('title', this.title);
      formData.append('body', this.body);
      formData.append('username', this.username);
      formData.append('user_id', this.user_id);
      formData.append('category', this.category);
      formData.append('tag', this.tags);
      formData.append('post_link', this.post_link);
      axios.post(addPostURL, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function (response) {
                        
                        toastr['success'](response.data.message);
                        axios.post(postIdGetURL).then(function (res) {
                                
                                navigate.$router.push({
                                    path: '/'
                                });
                            })
                            .catch(function (err) {
                                console.log(err);
                            });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
    },
    
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


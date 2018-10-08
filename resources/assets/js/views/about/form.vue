<template>
   <form @submit.prevent="proceed">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title<span class="input-required text-danger">*</span></label>
                                            <input v-validate="'required'" class="form-control" type="text" value="" v-model="page.title" name="title" autofocus maxlength="50" v-on:input="updateURL">
                                            <small class="text-danger">{{ errors.first('title') }}</small>
                                        </div>
                                    </div>
                                 </div>    
                                   <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Body</label>
                                            <!-- <vue-html5-editor :content="page.content :height="300" :z-index="1000" :auto-height="true" @change="updateData" name="body" ></vue-html5-editor>  -->
                                                 <!-- <vue-editor v-model="page.content"></vue-editor> -->
                                                  <editor v-model="page.content" :init="{height: 300, paste_as_text: true, toolbar: 'mybutton | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link | code |preview | fullscreen',browser_spellcheck: true,preview:true, plugins: 'autolink,fullscreen,insertdatetime,searchreplace,preview,wordcount,paste,table,lists,link,code'}"></editor>
                                                 
                                        </div>
                                    </div>
                                 </div> 
                                 <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tags</label>        
                                            <input-tag placeholder="Add Tag" :tags.sync="page.tags" name="tags"></input-tag>

                                        </div>
                                    </div>
                                 </div>   -->
                                  <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Category<span class="input-required text-danger">*</span></label>
                                            <select v-model="page.category" class="form-control" v-validate="'required'" name="category">
                                              <option value="Internship">Internship</option>
                                              <option value="Placement" >Placement</option>
                                              <option value="Announcement" >Announcement</option>
                                            </select>
                                            <small class="text-danger">{{ errors.first('category') }}</small>

                                        </div>
                                    </div>
                                 </div>   -->
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Page URL</label>
                                            <input class="form-control" type="text" value="" v-model="page.url" name="title" disabled>
                                        </div>
                                    </div>
                                 </div> 
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group files">
                                            <label for="">Image<span class="input-required text-danger">*</span></label>
                                            <input type="file" v-validate="'mimes:image/*'" class="form-control" ref="file" name="file" id="imageUrl" @change="handleChange">
                                            <small class="text-danger">{{ errors.first('file') }}</small>

                                        </div>
                                    </div>
                                 </div> 

                                 <div class="row" v-if="page.imageUrl !=null">
                                     <div class="col-md-12">
                                                <img v-if="image_change == true " class="img-fluid" :src="img_preview" alt="Image">
                                                <img v-else class="img-fluid" :src="'/images/posts/images/'+page.imageUrl" alt="Image">
                                     </div>
                                 </div>
                                  <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
                                      <span v-if="id">Update</span>
                                      <span v-else>Save</span>
                                  </button>
                            </form>
</template>
<script>
    import helper from '../../services/helper'
    import { addPageURL,postIdGetURL,apiDomain } from "../../config.js";
    // import { VueEditor } from 'vue2-editor'
    import Editor from '@tinymce/tinymce-vue';
    import InputTag from 'vue-input-tag'
                
    export default {
        data() {
            return {
                // taskForm: new Form({
                //     'title' : '',
                //     'description' : '',
                //     'start_date' : '',
                //     'due_date' : '',
                //     'progress' : 0
                // }),
                image_change:false,
                img_preview:'',
                page: {
                    title: '',
                    // region: '',

                    // date1: '',
                    url:'',
                    // date2: '',
                    // delivery: false,
                    // type: [],
                    // resource: '',
                    // desc: '',
                    content:'',
                    imagePath:'',
                    // tags: ['gndec','tnp'],
                    // category: '' ,
                    imageUrl: '',
                },
            };
        },
        components : { InputTag, 'editor': Editor },
        props: ['id'],
        mounted() {
            // console.log(this.id);
            if(this.id)
                this.getPosts();
        },
        methods: {  
            updateURL: function(){
                // if(this.page.title.length>1){
                this.page.url = this.page.title.replace(/\s+/g, '-').toLowerCase();
                console.log(this.page.url);
                // }
            },
            updateData: function (data) {
                this.page.content = data
            },
            handleChange(e) {
                this.image_change=true;
                this.page.imageUrl= e.target.files[0];
                this.img_preview = URL.createObjectURL(this.page.imageUrl);

                console.log(this.page.imageUrl);
            },
            proceed(){
                // this.taskForm.start_date = moment(this.taskForm.start_date).format('YYYY-MM-DD');
                // this.taskForm.due_date = moment(this.taskForm.due_date).format('YYYY-MM-DD');
                this.$validator.validateAll().then((result) => {
                if(result){
                    if(this.id)
                        this.updatePost();
                    else
                        this.storePost();
                }
                });
            },
            storePost(){
            var navigate = this;
            const postData = {
                // usertype : 'EXECUTIVE_MEMBER',
                title: this.page.title,
                body: this.page.content,
                username: this.$store.getters.getAuthUserFullName,
                user_id: this.$store.getters.getAuthUserId,
                image_path: 'images/about/images/',
                // tag:this.page.tags.toString(),
                url:this.page.url,
                // category:this.page.category,
                image:this.page.imageUrl
            };
            let formData = new FormData();
            formData.append('image', postData.image);
            formData.append('title', postData.title);
            formData.append('body', postData.body);
            formData.append('username', postData.username);
            formData.append('user_id', postData.user_id);
            formData.append('image_path', postData.image_path);
            // formData.append('tag', postData.tag);
            // formData.append('category', postData.category);
            formData.append('url', postData.url);
            axios.post(addPageURL,formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(function(response) {
                // console.log(response);
                // if (response.status == "200") {
                //   // window.location = "/dashboard";
                //     router.push({name:'security'});

                // }
                // if (response.status == "401") {
                //   }
                toastr['success'](response.data.message);
                // axios.post(postIdGetURL).then(function(res){
                //     // console.log(res.data.data);
                //         navigate.$router.push({path:'/post/'+res.data.data});
                // })
                // .catch(function(err) {
                // console.log(err);
                // });
         

                    // console.log(response.data.data.postCreate.id);
                })
                .catch(function(error) {
                console.log(error);
                });
                // this.taskForm.post('/api/task')
                // .then(response => {
                //     toastr['success'](response.message);
                //     this.$emit('completed',response.task)
                // })
                // .catch(response => {
                //     toastr['error'](response.message);
                // });
                    this.page.title= '';
                    this.page.content='';
                    // this.page.tags= ['gndec','tnp'];
                    // this.page.category= '' ;
                    this.page.imageUrl= '';
                    this.page.url= '';
          },
            getPosts(){
                axios.get('/api/dashboard/post/'+this.id+'/edit')
                .then(response => {
                    this.page.title = response.data.data.title;
                    this.page.content = response.data.data.body;
                    // this.page.tags = response.data.data.tag.split(',');
                    // this.page.category = response.data.data.category;
                    this.page.imageUrl = '';
                    this.page.url = response.data.data.url;
                })
                .catch(response => {
                    toastr['error'](response.message);
                });
            },
            updatePost(){
                const postData = {
                    // usertype : 'EXECUTIVE_MEMBER',
                    title: this.page.title,
                    body: this.page.content,
                    username: this.$store.getters.getAuthUserFullName,
                    user_id: this.$store.getters.getAuthUserId,
                    image_path: 'images/about/images/',

                    // tag:this.page.tags.toString(),
                    
                    url:this.page.url,
                    // category:this.page.category,
                    image:this.page.imageUrl
            };
                let formData = new FormData();
                formData.append('image', postData.image);
                formData.append('title', postData.title);
                formData.append('body', postData.body);
                formData.append('username', postData.username);
                formData.append('user_id', postData.user_id);
                formData.append('image_path', postData.image_path);

                // formData.append('tag', postData.tag);
                // formData.append('category', postData.category);
                formData.append('url', postData.url);
                formData.append('_method', 'PUT');

                axios.post('/api/dashboard/about/'+this.id,formData,{headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {
                    console.log(response);
                    // if(response.type == 'error')
                    //     toastr['error'](response.message);
                    // else {
                    //     this.$router.push('/task');
                    // }
                    toastr['success'](response.data.message);
                    console.log(this.$store.getters.getAuthUserType);
                    // if (this.$store.getters.getAuthUserType == "ADMIN") {
                    //     this.$router.push('/about/'+response.data.data.id);
                    // }
                    // else if(this.$store.getters.getAuthUserType == "EXECUTIVE_MEMBER")
                    // {
                    //     this.$router.push('/exec/post/'+response.data.data.id);
                    // }



                })
                .catch(response => {
                    toastr['error'](response.message);
                });
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

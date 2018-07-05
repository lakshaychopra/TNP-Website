<template>
   <form @submit.prevent="proceed">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input class="form-control" type="text" value="" v-model="post.title">
                                        </div>
                                    </div>
                                 </div>    
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Body</label>
                                            <vue-html5-editor :content="post.content" :height="300" :auto-height="true"  @change="updateData"></vue-html5-editor> 
                                        </div>
                                    </div>
                                 </div> 
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tags</label>        
                                            <input-tag placeholder="Add Tag" :tags.sync="post.tags"></input-tag>

                                        </div>
                                    </div>
                                 </div>  
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select v-model="post.category" class="form-control">
                                              <option value="Internship">Internship</option>
                                              <option value="Placement" >Placement</option>
                                            </select>
                                        </div>
                                    </div>
                                 </div>  
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group files">
                                            <label for="">Image</label>
                                            <input type="file" class="form-control" ref="file" name="file" id="imageUrl" @change="handleChange">

                                        </div>
                                    </div>
                                 </div> 
                                 <div class="row" v-if="post.imageUrl !=null">
                                     <div class="col-md-12">
                                                <img v-if="image_change == true " class="img-fluid" :src="img_preview" alt="Image">
                                                <img v-else class="img-fluid" :src="'/images/posts/images/'+post.imageUrl" alt="Image">
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
    import { addPostURL } from "../../config.js";
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
                    tags: ['gndec','tnp'],
                    category: '' ,
                    imageUrl: '',
                },
            };
        },
        components : { InputTag },
        props: ['id'],
        mounted() {
            // console.log(this.id);
            if(this.id)
                this.getPosts();
        },
        methods: {            
            updateData: function (data) {
                this.post.content = data
            },
            handleChange(e) {
                this.image_change=true;
                this.post.imageUrl= e.target.files[0];
                this.img_preview = URL.createObjectURL(this.post.imageUrl);

                console.log(this.post.imageUrl);
            },
            proceed(){
                // this.taskForm.start_date = moment(this.taskForm.start_date).format('YYYY-MM-DD');
                // this.taskForm.due_date = moment(this.taskForm.due_date).format('YYYY-MM-DD');
                if(this.id)
                    this.updatePost();
                else
                    this.storePost();
            },
            storePost(){
            const postData = {
                // usertype : 'EXECUTIVE_MEMBER',
                title: this.post.title,
                body: this.post.content,
                username:'admin',
                user_id: '1',
                tag:this.post.tags.toString(),
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
            },
            getPosts(){
                axios.get('/api/dashboard/post/'+this.id+'/edit')
                .then(response => {
                    this.post.title = response.data.data.title;
                    this.post.content = response.data.data.body;
                    this.post.tags = response.data.data.tag.split(',');
                    this.post.category = response.data.data.category;
                    this.post.imageUrl = response.data.data.image;
                })
                .catch(response => {
                    toastr['error'](response.message);
                });
            },
            updatePost(){
                const postData = {
                    // usertype : 'EXECUTIVE_MEMBER',
                    title: this.post.title,
                    body: this.post.content,
                    username:'admin',
                    user_id: '1',
                    tag:this.post.tags.toString(),
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
                formData.append('_method', 'PUT');

                axios.post('/api/dashboard/post/'+this.id,formData,{headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {
                    console.log(response);
                    // if(response.type == 'error')
                    //     toastr['error'](response.message);
                    // else {
                    //     this.$router.push('/task');
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

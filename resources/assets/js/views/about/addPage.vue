<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Pages</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/admin">Home</router-link></li>
                    <li class="breadcrumb-item active">Pages</li>
                </ol>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Page</h4>
                          <about-form></about-form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>

  import AboutForm from './form'

export default {
   props: ['id'],
   components: {
    AboutForm
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
        tags: ['gndec','tnp'],
        category: '' ,
        imageUrl: '',
 
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
      this.post.imageUrl = e.target.files[0];
      console.log(this.post.imageUrl);
},
    proceed() {
      // this.$refs[formName].validate((valid) => {
          // if (valid) {
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

          // } else {
          //   console.log('error submit!!');
          //   return false;
          // }
        // });
     
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


<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary shadow-sm" v-for="post in posts.data" :key="post.id">
                    <div class="card-header"><h5>{{post.title}}</h5><small class="pull-right sub-head"><span style="float:left;">{{post.category}}</span>
                      <div class="dropdown">
                          <i id="menu" class="fa fa-ellipsis-h fa-2x" data-toggle="dropdown" aria-hidden="true"></i>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Pin To Top</a>
                          </div>
                       </div>
                    </small>
                    </div>
                    <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->
                    <div class="card-img-top" data-toggle="modal" data-target="#exampleModal">
                        <img src="app/images/tnpPost/post_images/tnpPostxGiNNdWKZN6YuLc0.jpg" alt="">
                    </div>
                    <div class="card-body">
                      <div><small ><strong>{{post.updated_at}}</strong></small><span class="pull-right"><i id="share" git class="fa fa-share-alt fa-2x" aria-hidden="true"></i></span> </div>
                        <!-- <ul class="list-group">
                          <li class="list-group-item"></li>
                        </ul> -->
                      {{post.body}}
                    </div>
                    <div class="card-footer"><span class="pull-right"><button class="btn btn-custom shadow-sm">GNDEC</button><button class="btn btn-custom shadow-sm">TNP</button></span></div>
                </div>
            </div>
        </div>
        <modal></modal>
    </div>
</template>

<script>
  import modal from "./modal";
  import getPostsURL from "../../config.js";
    export default {
      components:{
        modal,
      },
      data(){
        return{
          posts: {},
          showDropDown:false,
        }
      },
      methods(){
        
      },
      mounted() {
          axios.get('/admin/post')
          .then((response) => {
            // var obj = JSON.parse(response.data);
            // console.log(response);
            this.posts = response.data;
            console.log(response.data);
          
          })
          .catch((error) => console.log(error))
      }
    }
</script>
<style scoped>
.col-primary{
  color: #304156 ;
}
.card{
  border-radius: 0;
  margin-bottom: 30px;
}
.card-header{
  background-color: #fff;
  padding: 0.62rem 1.15rem;
  margin-top: 6px;
}
.card-header h5{
  float: left;
}
.card-footer{
  background-color: #e4e4e4;
}
.card-body{
      padding: 1.15rem;
      font-size: 16px;
      position: relative;
}
.sub-menu{
      background-color: #696969;
      width: 150px;
      list-style-type: none;
}
.card-img-top{
    height: 200px;
    /* background: url('/images/1.jpg') center no-repeat;
    background-size: cover; */
}
.btn-custom{
  background-color: #b3b6b9;
  color: #696969;
  padding: 1px 4px;
  border-radius: 0;
  font-size: 12px;
  margin-right: 4px;
}
.sub-head{
  margin-top: 3px;
}
#share{
    position: absolute;
    top: -37px;
    padding: 20px;
    right: 20px;
    background: #304156;
    border: 11px solid;
    border-radius: 50%;
    color: #fff;
}
#menu{
    margin-left: 10px;
    vertical-align: middle;
}
.dropdown{
  float:right;
}
.dropdown-menu{
  transform: translate3d(-118px, 23px, 0px) !important;
}
.dropdown-item i{
  margin-right:10px;
}
</style>


<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary shadow-sm">
                    <div class="card-header"><h5>Post Title <small class="pull-right sub-head">Category</small>  </h5>
                    </div>
                    <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->
                    <div class="card-img-top">

                    </div>
                    <div class="card-body">
                      <div><small ><strong>Timings</strong></small><span class="pull-right"><i id="share" class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
 <i class="fa fa-ellipsis-h fa-1x" aria-hidden="true"></i></span> </div>
                        <!-- <ul class="list-group">
                          <li class="list-group-item"></li>
                        </ul> -->
                      Post Body
                    </div>
                    <div class="card-footer"><span class="pull-right"><button class="btn btn-custom shadow-sm">GNDEC</button><button class="btn btn-custom shadow-sm">TNP</button></span></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return{
          posts: {},
        }
      },
      methods(){
        
      },
      mounted() {
          axios.get('admin/post')
          .then((response) => this.posts = response.data)
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
}
.card-header{
  background-color: #fff;
  padding: 0.62rem 1.15rem;
  margin-top: 6px;
}
.card-footer{
  background-color: #e4e4e4;
}
.card-body{
      padding: 1.15rem;
      font-size: 16px;
      position: relative;
}
.card-img-top{
    height: 200px;
    background: url('/images/1.jpg') center no-repeat;
    background-size: cover;
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
</style>


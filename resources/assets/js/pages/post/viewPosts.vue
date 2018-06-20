<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary" v-for="post in posts" v-bind:key="post.body">
                    <div class="card-header">Navigation</div>

                    <div class="card-body">
                        <ul class="list-group">
                          <li class="list-group-item">{{post.body}}</li>
                        </ul>
                    </div>
                    <div class="card-footer"><small class="pull-right">Copyright</small></div>
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

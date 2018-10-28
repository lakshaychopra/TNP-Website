<template>
  <div class="container">
    <div class="row card-primary mb-3 py-3">
      <div class="col-md-12">
        <form class="form-inline" action="/" method="GET">
          <input class="form-control" type="text" placeholder="Search" v-model="search" @keyup="searchPost"
            autocomplete="on" id="search">
          <a class="nav-link float-right" href="javascript:void(0)" data-target="#more" id="caret" data-toggle="collapse">
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </a>
          <div class="bgcolor w-90 text-uppercase collapse py-1" id="more">
            <div class="owl-carousel" id="nav">
              <div class="ml-4">
                <a href="javascript:void(0) " @click="searchby_category('All')">All</a>
              </div>
              <div>
                <a href="javascript:void(0) " @click="searchby_category('Announcement')">Announcement</a>
              </div>
              <div>
                <a href="javascript:void(0) " @click="searchby_category('Internship')">Internship</a>
              </div>
              <div>
                <a href="javascript:void(0) " @click="searchby_category('Placement')">Placement</a>
              </div>
              <div>
                <a href="javascript:void(0) " @click="searchby_category('Selected')">Selected</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-primary shadow-sm" v-for="post in posts" :key="post.id">
          <div class="card-header">
            <h3>{{post.title}}</h3>
            <small class="pull-right sub-head">
              <span style="float:left;">{{post.category}}</span>
              <div class="dropdown">
                <i id="menu" class="fa fa-ellipsis-h fa-2x" data-toggle="dropdown" aria-hidden="true"></i>
                <div class="dropdown-menu">
                  <router-link v-bind:to="{ path:'/exec/post/'+post.id +'/edit'}">
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                  </router-link>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0)" @click.prevent="delPost(post.id)">
                    <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                  <div class="dropdown-divider"></div>
                  <a v-if="post.is_pinned == 0" class="dropdown-item" href="javascript:void(0)" @click.prevent="pinPost(post.id)">
                    <i class="fa fa-thumb-tack" aria-hidden="true"></i> Pin To Top</a>
                  <a v-else class="dropdown-item" href="javascript:void(0)" @click.prevent="unpinPost(post.id)">
                    <i class="fa fa-thumb-tack" aria-hidden="true"></i> Unpin </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0)" @click.prevent="notifyPost(post.id)">
                    <i class="fa fa-share" aria-hidden="true"></i> Notify</a>
                </div>
              </div>
            </small>
          </div>
          <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->

          <div class="card-img-top" data-toggle="modal" v-if="post.image != null" data-target="#exampleModal" :style="getImage(post.image)"
            :postImage="post.image">
            <!-- <img :src="getImage(post.image_path)" alt=""> -->
          </div>
          <div class="card-body">
            <div>
              <small>
                <strong>{{post.updated_at}}</strong>
              </small>
            </div>
            <!-- <ul class="list-group">
                          <li class="list-group-item"></li>
                        </ul> -->
            <span class="text-justify" v-html="post.body"></span>
          </div>
          <div class="card-footer">
            <span class="pull-right">
              <button class="btn btn-custom shadow-sm" v-for="tag in post.tag.split(',')" :key="tag">{{
                tag.toUpperCase() }}</button>
            </span>
          </div>
        </div>
        <div class="text-center" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
          <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px" v-if="loading"></i>
        </div>
      </div>
    </div>
    <!-- <modal></modal> -->
  </div>
</template>

<script>
  // import modal from "./modal";
  import {
    addPostURL,
    categoryURL,
    searchURL
  } from "../../../config.js";
  export default {
    props: ['searchbox'],
    components: {
      // modal,
    },
    data() {
      return {
        loading: 1,
        page: 2,
        busy: false,
        postEdit: {},
        posts: {},
        showDropDown: false,
        search_input: false,
        search: '',
      }
    },
    methods: {
      loadMore: function () {
        const vm = this;
        vm.loading = 1;
        vm.busy = true;
        vm.getallpost();
      },
      refreshPost(record) {
        this.posts = record.data;
      },
      delPost(id) {
        this.$swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            axios.post('/api/dashboard/post/' + id, {
                id: id,
                _method: 'DELETE'
              }).then((response) => {
                // console.log(response.data);

                this.$swal(
                  'Deleted!',
                  'Your post has been deleted.',
                  'success'
                )
                this.refreshPost(response);
              })
              .catch((error) => console.log(error))

          }
        })
      },
      notifyPost(id, title) {
        this.$swal({
          title: 'Are you sure to notify post?',
          text: "You won't be able to revert this!",
          type: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Notify subscribers!'
        }).then((result) => {
          if (result.value) {
            axios.post('/api/dashboard/post/notifyme' + id, {
                id: id,
                _method: 'POST'
              }).then((response) => {
                // console.log(response.data);

                this.$swal(
                  'Notified!',
                  'Your post has been notified.',
                  'success'
                )
                this.refreshPost(response);
              })
              .catch((error) => console.log(error))
          }
        })
      },
      pinPost(id) {
        axios.post('/api/dashboard/post/pinned/' + id, {
            id: id,
            _method: 'PUT'
          }).then((response) => {
            //toastr['response'](response.data.message);
            this.$swal(
              response.data.message,
            )
            this.refreshPost(response);
          })
          .catch((error) => console.log(error))
      },
      unpinPost(id) {
        axios.post('/api/dashboard/post/unpinned/' + id, {
            id: id,
            _method: 'PUT'
          }).then((response) => {
            // toastr['response'](obj['response']['message']);
            this.$swal(
              response.data.message,
            )
            this.refreshPost(response)
          })
          .catch((error) => console.log(error))
      },
      getImage(index) {
        return "background: url(/images/posts/images/" + index + ") center no-repeat;    background-size: cover;";
      },
      getPost(id) {
        // console.log(id);
        // axios.get('/admin/post/'+ id +'/edit')
        // .then((response) => {
        // console.log(response.data.data);
        // this.postEdit = response.data.data;
        // this.$router.push({
        //   name:'edit',
        //   params:{rec: id}
        // });
        // })
        // .catch((error) => console.log(error))
      },
      getallpost: function () {
        setTimeout(() => {
          const vm = this;
          vm.page = vm.page + 1;
          axios.get('/api/dashboard/post?page=' + vm.page)
            .then(function (response) {
              // console.log(response.data.data.data);
              if (response.data.data.data.length == 0) {
                vm.busy = true;
              } else {
                vm.busy = false;
              }
              for (var i = 0; i < response.data.data.data.length; i++) {
                // console.log(response.data.data.data[i]);
                vm.posts.push(response.data.data.data[i]);
              }
              vm.loading = 0;

            })
            .catch(function (error) {});
        }, 2000);
      },
      searchPost() {
        if (this.search.length >= 2) {
          axios.get(searchURL + this.search)
            .then(response => this.$parent.posts = response.data.data.data,

              this.$parent.pinned_posts = undefined
            )
        } else {
          this.$parent.getPosts();
          this.$parent.getPinnedPosts();
        }
      },
      searchby_category(category) {
        if (category != "All") {
          axios.get(categoryURL + category)
            .then(response => this.$parent.posts = response.data.data.data, this.$parent.pinned_posts =
              undefined)
        } else {
          this.$parent.getPosts();
          this.$parent.getPinnedPosts();
        }
      }
    },
    created() {
      axios.get(addPostURL)
        .then((response) => {
          // var obj = JSON.parse(response.data);
          // console.log(response);
          this.posts = response.data.data.data;
          // console.log(response.data.data.data);

        })
        .catch((error) => console.log(error))
    },
    beforeCreate() {
      var vm = this;
      Vue.nextTick(function () {
        $("#nav").owlCarousel({
          autoWidth: true,
          margin: 45,
          stagePadding: 50,
        });
      }.bind(vm))
    }
  }
</script>
<style scoped>
  .col-primary {
    color: #304156;
  }

  .card-primary {
    background: #fff;
  }

  .card {
    border-radius: 0;
    margin-bottom: 30px;
    border-top: 3px solid #00a7d0;
  }

  .card-header {
    background-color: #fff;
    padding: 0.62rem 1.15rem;
    margin-top: 6px;
  }

  .card-header h3 {
    float: left;
  }

  .card-footer {
    background-color: #e4e4e4;
  }

  .card-body {
    padding: 1.15rem;
    font-size: 16px;
    position: relative;
  }

  .sub-menu {
    background-color: #696969;
    width: 150px;
    list-style-type: none;
  }

  .card-img-top {
    height: 200px;
    /* background: url('/images/1.jpg') center no-repeat; */
    background-size: cover;
  }

  .btn-custom {
    background-color: #b3b6b9;
    color: #696969;
    padding: 1px 4px;
    border-radius: 0;
    border-color: #b3b6b9;
    font-size: 14px;
    margin-right: 4px;
  }

  .sub-head {
    margin-top: 3px;
  }

  #share {
    position: absolute;
    top: -22px;
    padding: 12px;
    right: 20px;
    background: #304156;
    border: 5px solid;
    border-radius: 50%;
    color: #fff;
  }

  #menu {
    margin-left: 10px;
    vertical-align: middle;
  }

  .dropdown {
    float: right;
  }

  .dropdown-menu {
    transform: translate3d(-118px, 23px, 0px) !important;
  }

  .dropdown-item i {
    margin-right: 10px;
  }

  #caret {
    color: #038ed4 !important;
    padding: 10px;
    border-bottom: 4px solid rgba(255, 255, 255, 0);
  }

  #caret :hover {
    background-color: #038ed4 !important;
    color: #ffffff !important;
  }

  #search {
    background-color: #fff;
    border: solid #038ed4;
    width: 96%;
    color: #0073BC;
    border-radius: 25px;
  }

  #search :placeholder {
    color: #0073BC;
  }

  #nav {
    margin-bottom: 0;
    color: #fff;
    font-size: 16px;
    font-weight: 500;
  }

  #nav a {
    color: #038ed4 !important;
  }

  #nav a:hover {
    background-color: #f1f1f1 !important;
    color: #038ed4 !important;
  }

  #more {
    border-radius: 25px;
  }

  .bgcolor {
    background-color: #000;
  }

  .w-90 {
    width: 96%;
  }
</style>
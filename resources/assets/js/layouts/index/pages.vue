<template>
    <div class="bg-gray">
        <app-header></app-header>
        <div class="container py-4">
            <div class="row">

                <div class="col-3 px-1 d-none d-md-block sticky-top"  id="sidebar" >
                        <!-- <h2><i class="flag"></i> Category</h2>
                        <div class="nav flex-column">
                       
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                        </div> -->
                       <div class="sticky-top fix">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                        <h4>  Category</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Placement</a></li>
                                                    <li><a href="#">Internship</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                        <h4>  Category</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Placement</a></li>
                                                    <li><a href="#">Internship</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                       </div>
                </div>

                <div class="col" id="main">
                    
                   <div class="row justify-content-center" v-for="post in posts.data" :key="post.id" id="posts">
                        <div class="col-md-12">

                            <div class="card card-primary">

                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                                <h2>
                                                    <a href="#">{{post.title}}</a>
                                                </h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                 <!-- <small> -->
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <div class="post-meta-text col-primary ">{{post.updated_at}}</div>
                                                 <!-- </small> -->
                                            </div>
                                            <div class="pull-right">
                                                 <!-- <small> -->
                                                <i class="fa fa-flag" aria-hidden="true"></i> <div class="post-meta-text col-primary ">{{post.category}}</div>
                                                 <!-- </small> -->
                                            </div>
                                            <!-- <small>
                                                <i class="fa fa-calendar-check-o color-main" aria-hidden="true"></i> {{post.updated_at}}
                                                <span class="pull-right sub-head">
                                                    <i class="fa fa-flag color-main" aria-hidden="true"></i> {{post.category}}
                                                </span>
                                            </small> -->
                                        </div>
                                    </div>
                                </div> 
                            
                                <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->

                                 <div class="card-img-top" data-toggle="modal" v-if="post.image != null" data-target="#exampleModal" :style="getImage(post.image)"
                                    :postImage="post.image"> 
                                    <!-- <img :src="getImage(post.image_path)" alt=""> -->
                                 </div>
                                 
                                <div class="card-body">
                                    <!-- <div>
                                        <span class="pull-right share-button">
                                            <a href="#">
                                                <i id="share" class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </div>  -->
                           
                                    <!-- <ul class="list-group">
                            <li class="list-group-item"></li>
                            </ul> -->
                                    <div class="mb-3" v-html="post.body"></div>
                                    <div class="clearfix"></div>
                                    <div class="post-share">
                                        <div class="post-meta" style="background-color: #038ed4;">
                                            <i class="fa fa-share-alt" style="color:#fff;" aria-hidden="true"></i> <div style="color:#fff;" class="post-meta-text col-primary ">Share</div>
                                        </div>
                                         <div class="post-meta" style="float:right;">
                                            <i class="fa fa-tags" aria-hidden="true"></i> <div class="post-meta-text col-primary ">{{ post.tag }}</div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                                <!-- <div class="card-footer">
                                    <span class="pull-right">
                                        <button class="btn btn-custom shadow-sm" v-for="tag in post.tag.split(',')" :key="tag">{{ tag.toUpperCase() }}</button>
                                    </span>
                                </div> -->

                            <!-- </div>

                        </div> -->
                    </div>

                </div>

                <div class="col-3 px-1 d-none d-md-block sticky-top"  id="sidebar" >
                        <!-- <h2><i class="flag"></i> Category</h2>
                        <div class="nav flex-column">
                       
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                        </div> -->
                       <div class="sticky-top fix">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                        <h4>  Contact</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Placement</a></li>
                                                    <li><a href="#">Internship</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                        <h4>  Category</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Placement</a></li>
                                                    <li><a href="#">Internship</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AppHeader from './header.vue'
    import {
        addHomePostURL
    } from "../../config.js";

    export default {
        components: {
            AppHeader,
        },
        data() {
            return {
                postEdit: {},
                posts: {},
                showDropDown: false,
            }
        },
        created() {
            console.log("index");
            axios.get(addHomePostURL)
                .then((response) => {
                    // var obj = JSON.parse(response.data);
                    // console.log(response);
                    this.posts = response.data.data;
                    console.log(response.data.data);

                })
                .catch((error) => console.log(error))
        },
        methods: {
            getImage(index) {
                return "background: url(/images/posts/images/" + index +
                    ") center no-repeat;    background-size: cover;";
            },
        }
    }
</script>
<style scoped>
.fix{
    overflow:hidden; 
    top: 90px;
}
.post-meta {
    margin-right: 15px;
    margin-bottom: 5px;
    margin-top: 5px;
    float: left;
    padding: 10px;
    border: 1px solid #e4e6e8;
    background-color: #f6f6f6;
    font-size: 12px;
    text-transform: uppercase;
}
.post-meta i {
    font-size: 15px;
    float: left;
    margin-right: 10px;
    color: #a3a9b0;
}
.post-meta-text{
    float: right;
    font-size: 12px;
    padding-top: 3px;
    margin-left: 5px;
}
#sidebar .card-header{
    background-color: #fff;
    border-bottom: 0;
    padding-bottom: 0;
    z-index: 1;
}
#sidebar .card-header h4{
    border-bottom: 2px solid #ecedee;
    margin-bottom: 20px;
    line-height: 28px;
    padding-bottom: 10px;
    position: relative;
}
#sidebar .card-header h4:before{
    content: "";
    position: absolute;
    height: 2px;
    width: 28px;
    background-color: #2f3c4e;
    bottom: -2px;
    left: 0;
}
#sidebar .card-header h4:after{
    content: "\f0b0";
    display: block;
    float: left;
    background-color: #2f3c4e;
    font-family: FontAwesome;
    height: 28px;
    width: 28px;
    line-height: 28px;
    font-size: 14px;
    text-align: center;
    margin-right: 10px;
    color: #fff;
}
#sidebar .card-header i{
    float: left;
    margin-right: 9px;
    padding: 5px 7px;
    background-color: #2f3c4e;
    color: #fff;
    border-radius: 3px;
}
#sidebar .card-body{
    border-bottom: 1px solid #d3d5d7;
    box-shadow: 0 0 5px 0 #e2e3e4;
    padding-top: 0;
}
    #sidebar .card-body:before{
        content: "";
        height: 1px;
        width: 100%;
        background-color: #FFF;
        border-bottom: 1px solid #d3d5d7;
        -webkit-box-shadow: 0 0 5px 0 #e2e3e4;
        -moz-box-shadow: 0 0 5px 0 #e2e3e4;
        box-shadow: 0 0 5px 0 #e2e3e4;
        bottom: 2px;
        left: 0;
        position: absolute;
    }
    #sidebar .card-body:after{
        content: "";
    height: 1px;
    width: 100%;
    background-color: #FFF;
    border-bottom: 1px solid #d3d5d7;
    -webkit-box-shadow: 0 0 5px 0 #e2e3e4;
    -moz-box-shadow: 0 0 5px 0 #e2e3e4;
    box-shadow: 0 0 5px 0 #e2e3e4;
    bottom: 5px;
    left: 0;
    position: absolute;
    }
    .col-primary {
        color: #304156;
    }

    .card-primary {
        background: #fff;
    }

    #posts .card {
        border-radius: 1px;
        margin-bottom: 25px;
        /* border-top: 4px solid #038ed4; */
    }

    #posts .card-header {
        background-color: #fff;
        padding: 0.62rem 1.15rem;
        margin-top: 6px;
    }

    #posts .card-header h2 a {
        float: left;
        color: #2f3c4e;
        text-transform: uppercase;
        font-weight: 400;
    }
    #posts .card-header h2 a:hover {
        color: #038ed4;
    }
    #posts .post-share{
        padding-top: 20px;
        border-top: 1px solid #ecedee;
    }
    #posts .card-footer {
        padding: 0.40rem 0.40rem;
        background-color: #038ed4;
    }

    #posts .card-body {
        padding: 30px;
        font-size: 16px;
        position: relative;
        border-bottom: 1px solid #d3d5d7;
        box-shadow: 0 0 5px 0 #e2e3e4;
    }
    #posts .card-body:before{
        content: "";
        height: 1px;
        width: 100%;
        background-color: #FFF;
        border-bottom: 1px solid #d3d5d7;
        -webkit-box-shadow: 0 0 5px 0 #e2e3e4;
        -moz-box-shadow: 0 0 5px 0 #e2e3e4;
        box-shadow: 0 0 5px 0 #e2e3e4;
        bottom: 2px;
        left: 0;
        position: absolute;
    }
    #posts .card-body:after{
        content: "";
    height: 1px;
    width: 100%;
    background-color: #FFF;
    border-bottom: 1px solid #d3d5d7;
    -webkit-box-shadow: 0 0 5px 0 #e2e3e4;
    -moz-box-shadow: 0 0 5px 0 #e2e3e4;
    box-shadow: 0 0 5px 0 #e2e3e4;
    bottom: 5px;
    left: 0;
    position: absolute;
    }
    .clearfix{
        margin-bottom: 20px;
    }
    .sub-menu {
        background-color: #696969;
        width: 150px;
        list-style-type: none;
    }

    #posts .card-img-top {
        height: 200px;
        border-radius: 0;
        /* border-top: 1px solid #000; */
        /* background: url('/images/1.jpg') center no-repeat; */
        background-size: cover;
    }

    .btn-custom {
        background-color: #fff;
        color: #212426;
        padding: 1px 4px;
        border-radius: 14px;
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
        background: #038ed4;
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
    .bg-gray{
        background-color: #f1f1f1;
    }
    .color-main{
        color: #038ed4;
    }
</style>
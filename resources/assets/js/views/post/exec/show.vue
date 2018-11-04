<template>
    <div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">View Post</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link to="/home">Home</router-link>
                    </li>
                    <li class="breadcrumb-item">
                        <router-link to="/exec/post">Post</router-link>
                    </li>
                    <li class="breadcrumb-item active">View Post</li>
                </ol>
            </div>
        </div>

        <!-- <div class="row"> -->
        <!-- <div class="col-sm-12">
                <div class="card">
                    <div class="card-body"> -->
        <!-- <h4 class="card-title">View Post</h4> -->
        <div class="row">
            <div class="col" id="main">

                <div class="row justify-content-center" id="posts">

                    <div class="col-md-12">

                        <div class="card card-primary">

                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h2>
                                            <a href="javascript:void(0)">{{post.title}}</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">
                                            <!-- <small> -->
                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                            <div class="post-meta-text col-primary ">{{post.updated_at}}</div>
                                            <!-- </small> -->
                                        </div>
                                        <div class="pull-right">
                                            <!-- <small> -->
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                            <div class="post-meta-text col-primary ">{{post.category}}</div>
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
                            <div class="card-img-top" data-toggle="modal" v-if="post.image != null" data-target="#exampleModal"
                                :style="getImage(post.image)" :postImage="post.image">
                            </div>

                            <div class="card-body">
                                <div class="mb-3 text-justify" v-html="post.body"></div>
                                <div class="clearfix"></div>
                                <div class="post-share">
                                    <div class="post-meta" style="background-color: #038ed4;">
                                        <i class="fa fa-share-alt" style="color:#fff;" aria-hidden="true"></i>
                                        <div style="color:#fff;" class="post-meta-text col-primary ">Share</div>
                                    </div>
                                    <div class="post-meta" style="float:right;">
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <div class="post-meta-text col-primary ">{{ post.tag }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
    </div>
</template>
<script>
    import {
        showPostURL
    } from "../../../config.js";
    export default {
        data() {
            return {
                post: {},
                id: this.$route.params.id
            }
        },
        created() {
            axios.get(showPostURL + this.id).then((response) => {
                    this.post = response.data.data;
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
    .fix {
        overflow: hidden;
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

    .post-meta-text {
        float: right;
        font-size: 12px;
        padding-top: 3px;
        margin-left: 5px;
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

    #posts .post-share {
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

    #posts .card-body:before {
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

    #posts .card-body:after {
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

    .clearfix {
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
</style>
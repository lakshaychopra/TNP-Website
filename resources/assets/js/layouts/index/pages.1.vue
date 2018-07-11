<template>
    <div class="bg-gray">
        <app-header></app-header>
        <div class="container-fluid">
            <div class="row">

                <div class="col-3 px-1 d-none d-md-block" id="sticky-sidebar">
                    <div class="py-2 sticky-top">
                        <div class="nav flex-column">
                            <a href="" class="nav-link">Sidebar</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                            <a href="" class="nav-link">Link</a>
                        </div>
                    </div>
                </div>

                <div class="col" id="main">

                    <div class="row justify-content-center" v-for="post in posts.data" :key="post.id">
                        <div class="col-md-12">

                            <div class="card card-primary">

                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="#">
                                                <h3 style="margin:0;">{{post.title}}</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small>
                                                <i class="fa fa-calendar-check-o color-main" aria-hidden="true"></i> {{post.updated_at}}
                                                <span class="pull-right sub-head">
                                                    <i class="fa fa-flag color-main" aria-hidden="true"></i> {{post.category}}
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->

                                <div class="card-img-top" data-toggle="modal" v-if="post.image != null" data-target="#exampleModal" :style="getImage(post.image)"
                                    :postImage="post.image">
                                    <!-- <img :src="getImage(post.image_path)" alt=""> -->
                                </div>
                                <div class="card-body">
                                    <div>
                                        <span class="pull-right share-button">
                                            <a href="#">
                                                <i id="share" class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </div>
                                    <!-- <ul class="list-group">
                            <li class="list-group-item"></li>
                            </ul> -->
                                    <span v-html="post.body"></span>
                                </div>

                                <div class="card-footer">
                                    <span class="pull-right">
                                        <button class="btn btn-custom shadow-sm" v-for="tag in post.tag.split(',')" :key="tag">{{ tag.toUpperCase() }}</button>
                                    </span>
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
    .col-primary {
        color: #304156;
    }

    .card-primary {
        background: #fff;
    }

    .card {
        border-radius: 1px;
        margin-bottom: 25px;
        border-top: 4px solid #038ed4;
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
        padding: 0.40rem 0.40rem;
        background-color: #038ed4;
    }

    .card-body {
        padding: 2.15rem;
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
        border-top: 1px solid #000;
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
        background-color: #e9ebee;
    }
    .color-main{
        color: #038ed4;
    }
</style>
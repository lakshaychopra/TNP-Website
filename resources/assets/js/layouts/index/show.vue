<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <!-- Brand -->
            <strong>
                <a class="navbar-brand d-none d-md-block" href="/">Training &amp; Placement Cell</a>
                <a class="navbar-brand d-md-none" href="/">T&amp;P Cell</a>
            </strong>
            <div class="navbar-header">
                <!-- Navbar links -->
                <div class="navbar-text d-md-none">
                    <ul class="navbar-nav list-inline">
                        <li class="nav-item ">
                            <a class="nav-link" href="#" @click="search_input = !search_input">
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse" id="collapsibleNavbar">
                <div class="mr-auto d-none d-md-block w-65" v-if="this.searchbox=true">

                </div>
                <ul class="nav navbar-nav" id="list-menu">
                    <li class="nav-item">
                        <a class="nav-link float-right" href="/about">
                            <i class="fa fa-users" aria-hidden="true"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link float-right" href="/login" v-if="this.$store.state.auth.username">
                            <i class="fa fa-home" aria-hidden="true"></i> Profile</a>
                        <a class="nav-link float-right" href="/login" v-else>
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="bg-gray">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-9 col-xs-12" id="main">
                        <div class="row justify-content-center" id="posts">
                            <div class="col-md-12">

                                <div class="card card-primary">

                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-1 d-none d-md-block mr-1">
                                                <a href="/">
                                                    <img class=" mt-2" src="/images/icons/120x120.png" width="48px" height="48px" alt="logo-tpo">
                                                </a>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2>
                                                            <router-link :to="{ name: 'view', params: { id:post.id }}">
                                                                <a href="#">{{post.title}}</a>
                                                            </router-link>
                                                        </h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="pull-left">
                                                            <!-- <small> -->
                                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                            <div class="post-meta-text col-primary float-right " v-html="setDateFormat(post.created_at)"></div>
                                                            <!-- </small> -->
                                                        </div>
                                                        <div class="pull-right">
                                                            <!-- <small> -->
                                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                                            <div class="post-meta-text col-primary float-right ">

                                                                {{post.category}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div v-if="post.image!=null">
                                        <img :src="'/images/posts/images/'+post.image" :alt="post.image" width="100%" class="card-image-top">
                                    </div>


                                    <div class="card-body">
                                        <div class="mb-3" v-html="post.body"></div>
                                        <div class="clearfix"></div>

                                        <div class="row" id="bt">
                                            <div class="col-md-6 col-xs-12" id="share-social">
                                                <div class="post-share">

                                                    <div class="post-meta col-xs-12" style="background-color: #038ed4;" v-if="!share_fn()">
                                                        <a href="" @click.prevent="AndroidNativeShare(post.title,post.id,post.category)">
                                                            <i class="fa fa-share-alt" style="color:#fff;" aria-hidden="true"></i>
                                                            <div style="color:#fff;" class="post-meta-text col-primary " data-toggle="tooltip"> Share</div>
                                                        </a>


                                                    </div>
                                                    <span class="share" v-if="share_fn()">
                                                        <social-sharing :url="getURL(post.id)" inline-template>
                                                            <div>
                                                                <network network="facebook">
                                                                    <i class="fa fa-fw fa-facebook mr-3"></i>
                                                                </network>
                                                                <network network="linkedin">
                                                                    <i class="fa fa-fw fa-linkedin mr-3"></i>
                                                                </network>
                                                                <network network="twitter">
                                                                    <i class="fa fa-fw fa-twitter"></i>
                                                                </network>
                                                            </div>
                                                        </social-sharing>
                                                    </span>

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xs-12 mt-3">
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
                    <widget-right></widget-right>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AppHeader from './header.vue'
    import WidgetLeft from './leftWidget.vue'
    import WidgetRight from './rightWidget.vue'
    import {
        addHomePostURL,
        apiDomain,
        viewPost,
        categoryURL,
        pinnedPostURL
    } from "../../config.js";
    import helper from '../../services/helper.js';

    export default {
        components: {
            AppHeader,
            WidgetLeft,
            WidgetRight
        },
        data() {
            return {
                id: this.$route.params.id,

                postEdit: {},
                post: {},
                pinned_posts: {},
                showDropDown: false,
                share: false,

            }
        },
        created() {
            //console.log("index");
            if (typeof navigator.share === 'undefined' || !navigator.share) {
                this.share = true;
                // alert('Your browser does not support Android Native Share, it\'s tested on chrome 63+');
            } else if (window.location.protocol != 'https:') {
                // alert('Android Native Share support only on Https:// protocol');
                this.share = true
            } else {
                this.share = false;
            }
            console.log(this.share);
            this.loading = 0;
            axios.get('/api/home/view/' + this.id).then((response) => {
                    this.post = response.data.data.data[0];
                    console.log(this.post);
                })
                .catch((error) => console.log(error))
        },
        methods: {
            // searchby_category(category) {
            //     if (category != "All") {
            //         axios.get(categoryURL + category)
            //             .then(response => this.$parent.posts = response.data.data.data)
            //     } else {
            //         this.$parent.getPosts();
            //     }
            // },
            getURL(id) {
                return "https://www.tnpgndec.com/view/" + id;
            },
            share_fn() {
                return this.share;
            },
            gethtml(text) {
                var maxLength = 400 // maximum number of characters to extract
                //trim the string to the maximum length
                var trimmedString = text.substr(0, maxLength);
                //re-trim if we are in the middle of a word
                trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))
                return trimmedString;
            },
            AndroidNativeShare(Title, URL, Description) {
                console.log(Title);
                console.log(Description);

                if (typeof navigator.share === 'undefined' || !navigator.share) {
                    // alert('Your browser does not support Android Native Share, it\'s tested on chrome 63+');
                } else if (window.location.protocol != 'https:') {
                    // alert('Android Native Share support only on Https:// protocol');
                    this.share = true
                } else {
                    if (typeof URL === 'undefined') {
                        URL = window.location.href;
                    }
                    if (typeof Title === 'undefined') {
                        Title = document.title;
                    }
                    if (typeof Description === 'undefined') {
                        Description = 'Share your thoughts about ' + Title;
                    }
                    let URLConst = 'https://www.tnpgndec.com/view/' + URL;
                    const canonicalElement = document.querySelector('link[rel=canonical]');
                    if (canonicalElement !== null) {
                        URLConst = 'https://www.tnpgndec.com/view/' + URL;
                    }
                    const TitleConst = Title;
                    const DescriptionConst = URLConst;
                    console.log(URLConst);
                    if (navigator.share) {
                        navigator.share({
                                title: TitleConst,
                                text: TitleConst,
                                url: URLConst,
                            })
                            .then(() => console.log('Successful share'))
                            .catch((error) => console.log('Error sharing', error));
                    }
                }
            },
            loadMore: function () {
                const vm = this;
                vm.loading = 1;
                vm.busy = true;
                vm.getallpost();
            },
            setDateFormat(date) {
                return helper.formatDateTime(date);
            },
            getallpost: function () {
                setTimeout(() => {
                    const vm = this;
                    axios.get('/api/home?page=' + vm.page)
                        .then(function (response) {
                            console.log(response.data.data.data.length);
                            if (response.data.data.data.length == 0) {
                                vm.busy = true;
                            } else {
                                vm.busy = false;
                            }
                            for (var i = 0; i < response.data.data.data.length; i++) {
                                console.log(response.data.data.data[i]);
                                vm.posts.push(response.data.data.data[i]);
                            }
                            vm.loading = 0;
                            vm.page = vm.page + 1;

                        })
                        .catch(function (error) {});
                }, 2000);
            },
            getImage(index) {
                return "background: url(/images/posts/images/" + index +
                    ") center no-repeat;    background-size: cover;";
            },
        }
    }
</script>
<style>
    .post-meta {
        margin-bottom: 5px;
        margin-top: 5px;
        float: left;
        width: 100%;
        padding: 10px;
        border: 1px solid #e4e6e8;
        background-color: #f6f6f6;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 450;
    }

    .post-meta i {
        font-size: 20px;
        float: left;
        margin-right: 10px;
        color: #a3a9b0;
        margin-top: 2px;
        font-weight: bold;
    }

    .pin {
        position: absolute;
        right: 7px;
        top: -7px;
    }

    .post-meta-text {
        font-size: 12px;
        padding-top: 3px;
        margin-left: 5px;
    }

    #sidebar .card-header {
        background-color: #fff;
        border-bottom: 0;
        padding-bottom: 0;
        z-index: 1;
    }

    #sidebar .card-header h4 {
        border-bottom: 2px solid #ecedee;
        margin-bottom: 20px;
        line-height: 28px;
        padding-bottom: 10px;
        position: relative;
    }

    #sidebar .card-header h4:before {
        content: "";
        position: absolute;
        height: 2px;
        width: 28px;
        background-color: #2f3c4e;
        bottom: -2px;
        left: 0;
    }

    #sidebar #about h4:after {
        content: "\f0c0";
    }

    #sidebar #office h4:after {
        content: "\f1ad";
    }

    #sidebar #filter h4:after {
        content: "\f0b0";
    }

    #sidebar #link h4:after {
        content: "\f08e";
    }

    #sidebar .card-header h4:after {
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

    #sidebar .card-header i {
        float: left;
        margin-right: 9px;
        padding: 5px 7px;
        background-color: #2f3c4e;
        color: #fff;
        border-radius: 3px;
    }

    #sidebar .card-body {
        border-bottom: 1px solid #d3d5d7;
        box-shadow: 0 0 5px 0 #e2e3e4;
        padding-top: 0;
    }

    #sidebar .card-body:before {
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

    #sidebar .card-body:after {
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

    #posts .post-share {
        padding-top: 20px;
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

    .dropdown {
        float: right;
    }

    .dropdown-menu {
        transform: translate3d(-118px, 23px, 0px) !important;
    }

    .dropdown-item i {
        margin-right: 10px;
    }

    .bg-gray {
        background-color: #f1f1f1;
    }

    .color-main {
        color: #038ed4;
    }

    #bg-trans {
        background: -webkit-linear-gradient(#333, #fff);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .share i {
        margin-top: 14px;
        font-size: 22px;
        color: #6b6b6b;
        margin-right: 6px;
    }

    .list-inline {
        padding-left: 0;
        list-style: none;
    }

    .bg-dark {
        background-color: #038ed4 !important;
    }

    .bg-col-grey {
        background-color: #eee;
        padding: 10px;
    }

    .btn {
        line-height: 1.5 !important;
    }

    #mr-btm-10 {
        margin-bottom: 10px;
    }

    #list-menu li a {
        color: #f7fbff;
        padding: 20px;
        float: left;
        border-bottom: 4px solid rgba(255, 255, 255, 0);
    }

    #list-menu li a:hover {
        /* color: #0073BC; */
        /* border-bottom: 4px solid #0073BC; */
        background-color: #f1f1f1;
        color: #038ed4;
    }

    #search {
        background-color: #fff;
        border-color: #0073BC;
        width: 83%;
        color: #0073BC;
        border-radius: 0;
    }

    #search::placeholder {
        color: #0073BC;
    }

    .navbar {
        padding: 0 1rem;
    }

    @media (min-width: 768px) {
        .navbar-header {
            width: 142px;
        }
    }

    .w-65 {
        width: 65%;
    }

    .fix {
        overflow: hidden;
        top: 90px;
    }

    @media only screen and (max-width: 500px) {
        #share-social {
            text-align: center;
        }
    }

    #bt {
        border-top: 1px solid #ecedee;
    }
</style>
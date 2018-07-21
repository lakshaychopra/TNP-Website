<template>
    <div>
        <div class="sticky-top" style="z-index:1022;">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
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
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
                <div class="navbar-collapse collapse" id="collapsibleNavbar">
                    <div class="mr-auto d-none d-md-block w-65">
                        <form class="form-inline" action="/" method="GET">
                            <input class="form-control" type="text" placeholder="Search" v-model="search" @keyup="searchPost" autocomplete="on" id="search">
                            <!-- <button class="btn btn-info" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button> -->
                        </form>
                    </div>
                    <ul class="nav navbar-nav" id="list-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/about">
                                <i class="fa fa-users" aria-hidden="true"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login" v-if="this.$store.state.auth.username">
                                <i class="fa fa-home" aria-hidden="true"></i> Profile</a>
                            <a class="nav-link" href="/login" v-else>
                                <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <form action="/" method="GET" v-if="search_input" class="d-sm-none">
                <div class="row bg-col-grey">
                    <div class="col-md-11">
                        <input id="mr-btm-10" class="form-control" type="text" v-model="search" @keyup="searchPost" autocomplete="on" placeholder="Search">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-block btn-info" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="bg-gray">
            <!-- <app-header></app-header> -->
            <div class="container py-4">
                <div class="row">

                    <div class="col-2 px-1 d-none d-md-block sticky-top" id="sidebar">
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
                                        <div class="card-header" id="filter">
                                            <h4 class="mb-1"> Filter By</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a href="#" @click="searchby_category('All')">All</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="#" @click="searchby_category('Placement')">Placement</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="#" @click="searchby_category('Internship')">Internship</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="mb-1"> Category</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a href="#">Placement</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="#">Internship</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" id="main">
                        <div class="row justify-content-center" id="posts" v-if="posts.length==0">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>No results found.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" v-for="post in posts" :key="post.id" id="posts" v-else>
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-1 d-none d-md-block mr-2">
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
                                                            <div class="post-meta-text col-primary ">{{post.updated_at}}</div>
                                                            <!-- </small> -->
                                                        </div>
                                                        <div class="pull-right">
                                                            <!-- <small> -->
                                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                                            <div class="post-meta-text col-primary ">
                                                                <router-link :to="{ name: 'view', params: { category:post.category }}">
                                                                    <a href="#">
                                                                        {{post.category}}
                                                                    </a>
                                                                </router-link>
                                                            </div>
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
                                        <span v-if="post.body.length>400">
                                            <div class="mb-3 show-read-more" v-html="gethtml(post.body)" id="bg-trans" style="padding: 10px;background-color: #f6f6f6;"></div>
                                            <router-link :to="{ name: 'view', params: { id:post.id }}">
                                                <button class="btn btn-block text-center" @click="gethtml(post.body)">
                                                    <a href="" style="color: #333;">Read More
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </button>
                                            </router-link>
                                        </span>
                                        <span v-else>
                                            <div class="mb-3 show-read-more" v-html="post.body"></div>
                                        </span>
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
                            <!-- <div class="card-footer">
                                    <span class="pull-right">
                                        <button class="btn btn-custom shadow-sm" v-for="tag in post.tag.split(',')" :key="tag">{{ tag.toUpperCase() }}</button>
                                    </span>
                                </div> -->

                            <!-- </div>

                        </div> -->
                        </div>
                        <div class="text-center" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
                            <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px" v-if="loading"></i>
                        </div>
                    </div>

                    <div class="col-3 px-1 d-none d-md-block sticky-top" id="sidebar">
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
                                        <div class="card-header" id="office">
                                            <h4>T&P OFFICE</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="office text-center">
                                                <img src="/images/sodhi.jpg" width="60%" alt="">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-10">
                                                    <p class="mb-0">
                                                        <strong>Prof. G. S. SODHI</strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-10">
                                                    <small>Officer (Training & Placement)</small>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <i class="fa fa-envelope mt-1" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <small>
                                                        <a href="mailto:gssodhi@gndec.ac.in" target="_blank">gssodhi@gndec.ac.in</a>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="row mt-1">

                                                <div class="col-md-2">
                                                    <i class="fa fa-phone mt-1" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <small>
                                                        <a href="tel:+919999999999" target="_blank">+91 99999 99999</a>
                                                    </small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="about">
                                            <h4> ABOUT</h4>
                                        </div>
                                        <div class="card-map">
                                            <a href="https://wego.here.com/directions/mix/mylocation/e-eyJuYW1lIjoiR25kZWMtIFRyYWluaW5nIGFuZCBQbGFjZW1lbnQiLCJhZGRyZXNzIjoiR3VydSBOYW5hayBEZXYgRW5naW5lZXJpbmcgQ29sbGVnZSBHaWxsIFBhcmsgTHVkaGlhbmEgMTQxMDA2LCBMdWRoaWFuYSwgUHVuamFiLCBJbmRpYSAxNDEwMDYiLCJsYXRpdHVkZSI6MzAuODU5MzM3NTA3ODAzLCJsb25naXR1ZGUiOjc1Ljg2MTY3Mjk3MzYzMywicHJvdmlkZXJOYW1lIjoiZmFjZWJvb2siLCJwcm92aWRlcklkIjoyODg1Nzc3NzExOTM4ODB9?map=30.859337507803,75.861672973633,15,normal&fb_locale=en_GB"
                                                rel="dialog" target="_blank" role="button" class="" tabindex="0">
                                                <div class="_4j7v _5bld">
                                                    <img class="_a3f img" alt="" aria-label="Map attachment" src="https://external.fluh1-1.fna.fbcdn.net/static_map.php?region=IN&amp;v=42&amp;osm_provider=2&amp;size=306x98&amp;zoom=15&amp;markers=30.85933751%2C75.86167297&amp;language=en_GB"
                                                        width="306" height="98">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body" style="padding-top:20px;">
                                            <!-- <iframe style="pointer-events:none; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.9278353122977!2d75.85737781489665!3d30.860695381592787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a828f09011b15%3A0xbf3f5b51dcc81b12!2sGuru+Nanak+Dev+Engineering+College!5e0!3m2!1sen!2sin!4v1531911243199" width="100%" height="200" frameborder="0"></iframe> -->
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fa fa-compass mt-1" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <small>Guru Nanak Dev Engineering College Gill Park Ludhiana 141006
                                                        <br> Ludhiana, Punjab, India
                                                        <br>
                                                        <a href="https://goo.gl/maps/B61b8nR1svs" target="_blank">Get Directions</a>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">
                                                    <i class="fa fa-phone mt-1" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <small>
                                                        <a href="tel:+919915781209" target="_blank">+91 99157 81209</a>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fa fa-globe mt-1" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <small>
                                                        <a href="https://www.gndec.ac.in" target="_blank">www.gndec.ac.in</a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
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
    // import AppHeader from './header.vue'
    import {
        addHomePostURL
    } from "../../config.js";
    import {
        searchURL
    } from "../../config.js";
    import {
        categoryURL
    } from "../../config.js";

    export default {
        // components: {
        //     AppHeader,
        // },
        data() {
            return {
                loading: 1,
                page: 2,
                busy: false,
                postEdit: {},
                posts: {},
                search_input: false,
                search: '',
                showDropDown: false
            }
        },
        created() {
            //console.log("index");
            this.loading = 0;
            this.getPosts();
        },
        methods: {
            gethtml(text) {
                var maxLength = 400 // maximum number of characters to extract
                //trim the string to the maximum length
                var trimmedString = text.substr(0, maxLength);
                //re-trim if we are in the middle of a word
                trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))
                return trimmedString;
            },
            loadMore: function () {
                const vm = this;
                vm.loading = 1;
                vm.busy = true;
                vm.getallpost();
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
            getrecord(record) {
                this.posts = record.data.data.data;
            },
            getPosts() {
                axios.get(addHomePostURL)
                    .then((response) => {
                        // var obj = JSON.parse(response.data);
                        // console.log(response);
                        this.getrecord(response);
                        // this.posts = response.data.data;
                        console.log(response.data.data);

                    })
                    .catch((error) => console.log(error))
            },
            searchPost() {
                if (this.search.length >= 3) {
                    axios.get(searchURL + this.search)
                        .then(response => this.posts = response.data.data.data)
                } else {
                    this.getPosts();
                }
            },
            getImage(index) {
                return "background: url(/images/posts/images/" + index +
                    ") center no-repeat;    background-size: cover;";
            },
            searchby_category(category) {
                if (category != "All") {
                    axios.get(categoryURL + category)
                        .then(response => this.posts = response.data.data.data)
                } else {
                    this.getPosts();
                }
            }
        }
    }
</script>
<style scoped>
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
</style>
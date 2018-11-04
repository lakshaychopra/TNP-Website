<template>
    <div>
        <app-header :searchbox="true"></app-header>
        <div class="bg-gray">
            <div class="container py-4">
                <div class="row">

                    <div class="col-2 px-1 d-none d-lg-block" id="sidebar">
                        <widget-left></widget-left>
                    </div>
                    <smooth-scroll></smooth-scroll>
                    <div class="col" id="main">
                        <div class="row" v-if="fakeload">
                            <div class="col-md-12">
                                <div class="card card-primary px-3 pb-3 pt-3 " v-for="index in 3" :key="index">
                                    <content-placeholders>
                                        <content-placeholders-heading :img="true" />
                                        <content-placeholders-img />
                                        <content-placeholders-text :lines="3" />
                                    </content-placeholders>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row justify-content-center" v-for="pin in pinned_posts" :key="pin.id" id="posts"
                                v-if="pinned_posts.length>0">
                                <div class="col-md-12">

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-1 d-none d-md-block">
                                                    <router-link to="/">
                                                        <img class=" mt-2" src="/images/icons/120x120.png" width="48px"
                                                            height="48px" alt="logo-tpo">
                                                    </router-link>
                                                </div>
                                                <div class="col-md-11 pl-4">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <h2>
                                                                <router-link :to="{ name: 'view', params: { id:pin.id }}"
                                                                    :searchbox="false">
                                                                    <a href="javascript:void(0)">{{pin.title}}</a>
                                                                </router-link>
                                                            </h2>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <div class="pull-left">
                                                                <!-- <small> -->
                                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                <div class="post-meta-text col-primary float-right"
                                                                    v-html="setDateFormat(pin.created_at)"></div>
                                                                <!-- </small> -->
                                                            </div>
                                                            <div class="pull-right">
                                                                <!-- <small> -->
                                                                <i class="fa fa-flag" aria-hidden="true"></i>
                                                                <div class="post-meta-text col-primary float-right ">
                                                                    <a href="javascript:void(0)" @click="searchby_category(pin.category)">
                                                                        {{pin.category}}
                                                                    </a>
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
                                            <i class="fa fa-thumb-tack text-danger pin" aria-hidden="true"></i>
                                        </div>

                                        <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->

                                        <div class="card-img-top" data-toggle="modal" v-if="pin.image != null"
                                            data-target="#exampleModal" :style="getImage(pin.image)" :postImage="pin.image">
                                            <!-- <img :src="getImage(post.image_path)" alt=""> -->
                                        </div>

                                        <div class="card-body text-justify">
                                            <!-- <div>
                                        <span class="pull-right share-button">
                                            <a href="javascript:void(0)">
                                                <i id="share" class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </span>
                                    </div>  -->

                                            <!-- <ul class="list-group">
                            <li class="list-group-item"></li>
                            </ul> -->
                                            <span v-if="pin.body.length>800">
                                                <div class="mb-3 text-justify show-read-more" v-html="gethtml(pin.body)"
                                                    style="padding: 5px;background-color: #fff;"></div>
                                                <router-link :to="{ name: 'view', params: { id:pin.id }}" :searchbox="false" style="background-color:rgb(223, 219, 219);">
                                                    <button class="btn btn-block btn-default text-center" @click="gethtml(pin.body)">
                                                        <a href="javascript:void(0)" style="color: #333;">Read More
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </button>
                                                </router-link>
                                            </span>
                                            <span v-else>
                                                <div class="mb-3 show-read-more" v-html="pin.body"></div>
                                            </span>
                                            <div class="clearfix"></div>
                                            <div class="row" id="bt">
                                                <div class="col-md-6 col-xs-12" id="share-social">
                                                    <div class="post-share">

                                                        <div class="post-meta col-xs-12" style="background-color: #038ed4;"
                                                            v-if="!share_fn()">
                                                            <a href="" @click.prevent="AndroidNativeShare(pin.title,pin.id,pin.category)">
                                                                <i class="fa fa-share-alt" style="color:#fff;"
                                                                    aria-hidden="true"></i>
                                                                <div style="color:#fff;" class="post-meta-text col-primary "
                                                                    data-toggle="tooltip"> Share</div>
                                                            </a>


                                                        </div>
                                                        <span class="share" v-if="share_fn()">
                                                            <social-sharing :url="getURL(pin.id)" inline-template>
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
                                                <div class="col-md-6 col-xs-12 mt-3 d-none d-sm-block">
                                                    <div class="post-meta" style="float:right;">
                                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                                        <div class="post-meta-text col-primary ">{{ pin.tag }}</div>
                                                    </div>
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

                            <div class="row justify-content-center" id="posts" v-if="posts.length==0">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>No results found.</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center" v-for="post in posts" :key="post.id" id="posts"
                                v-else>
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-1 d-none d-md-block mr-2">
                                                    <router-link to="/">
                                                        <img class=" mt-2" src="/images/icons/120x120.png" width="48px"
                                                            height="48px" alt="logo-tpo">
                                                    </router-link>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h2>
                                                                <router-link :to="{ name: 'view', params: { id:post.id }}">
                                                                    <a href="javascript:void(0)">{{post.title}}</a>
                                                                </router-link>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pull-left">
                                                                <!-- <small> -->
                                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                <div class="post-meta-text float-right col-primary "
                                                                    v-html="setDateFormat(post.created_at)"></div>
                                                                <!-- </small> -->
                                                            </div>
                                                            <div class="pull-right">
                                                                <!-- <small> -->
                                                                <i class="fa fa-flag" aria-hidden="true"></i>
                                                                <div class="post-meta-text float-right col-primary ">
                                                                    <a href="javascript:void(0)" @click="searchby_category(post.category)">
                                                                        {{post.category}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- <img class="card-img-top" src="/images/1.jpg" alt="Card image cap"> -->

                                        <div class="card-img-top" data-toggle="modal" v-if="post.image != null"
                                            data-target="#exampleModal" :style="getImage(post.image)" :postImage="post.image">
                                            <!-- <img :src="getImage(post.image_path)" alt=""> -->
                                        </div>

                                        <div class="card-body text-justify">

                                            <span v-if="post.body.length>800">
                                                <div class="mb-3 text-justify show-read-more" v-html="gethtml(post.body)"
                                                    style="padding:5px; padding-bottom:0; background-color: #fff;"></div>
                                                <router-link :to="{ name: 'view', params: { id:post.id }}" :searchbox="false" style="background-color:rgb(223, 219, 219);">
                                                    <button class="btn btn-block btn-default text-center " @click="gethtml(post.body)">
                                                        <a href="javascript:void(0)" style="color: #333;">Read More
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </button>
                                                </router-link>
                                            </span>
                                            <span v-else>
                                                <div class="mb-3 show-read-more" v-html="post.body"></div>
                                            </span>
                                            <div class="clearfix"></div>
                                            <div class="row" id="bt">
                                                <div class="col-md-6 col-xs-12" id="share-social">
                                                    <div class="post-share">

                                                        <div class="post-meta col-xs-12" style="background-color: #038ed4;"
                                                            v-if="!share_fn()">
                                                            <a href="" @click.prevent="AndroidNativeShare(post.title,post.id,post.category)">
                                                                <i class="fa fa-share-alt" style="color:#fff;"
                                                                    aria-hidden="true"></i>
                                                                <div style="color:#fff;" class="post-meta-text col-primary "
                                                                    data-toggle="tooltip"> Share</div>
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
                                                <div class="col-md-6 col-xs-12 mt-3 d-none d-sm-block">
                                                    <div class="post-meta" style="float:right;">
                                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                                        <div class="post-meta-text col-primary ">{{ post.tag }}</div>
                                                    </div>
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
                            <div class="text-center" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy"
                                infinite-scroll-distance="10">
                                <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px" v-if="loading"></i>
                            </div>
                        </div>
                    </div>
                    <widget-right></widget-right>
                </div>
            </div>
        </div>
        <add-home></add-home>
    </div>
</template>
<script>
    import AddHome from './a2h.vue'
    import AppHeader from './header.vue'
    import WidgetLeft from './leftWidget.vue'
    import WidgetRight from './rightWidget.vue'
    import SmoothScroll from './smoothscroll.vue'
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
            AddHome,
            AppHeader,
            WidgetLeft,
            WidgetRight,
            SmoothScroll
        },
        data() {
            return {
                loading: 1,
                page: 2,
                busy: false,
                postEdit: {},
                posts: {},
                pinned_posts: {},
                showDropDown: false,
                share: false,
                fakeload: true,
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
            // console.log(this.share);
            this.loading = 0;
            this.getPosts();
            this.getPinnedPosts();
        },
        methods: {

            getURL(id) {
                return "https://www.tnpgndec.com/view/" + id;
            },
            share_fn() {
                return this.share;
            },
            gethtml(text) {
                var maxLength = 800 // maximum number of characters to extract
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
                    const DescriptionConst = Description;
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
                            // console.log(response.data.data.data.length);
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
                        const vm = this;
                        // var obj = JSON.parse(response.data);
                        // console.log(response);
                        this.getrecord(response);
                        vm.fakeload = false;
                        // this.posts = response.data.data;
                        // console.log(response.data.data);

                    })
                    .catch((error) => console.log(error))
            },
            getPinnedPosts() {
                axios.get(pinnedPostURL)
                    .then((response) => {
                        // var obj = JSON.parse(response.data);
                        // console.log(response);
                        this.pinned_posts = response.data.data;
                        // this.fakeload =1;
                        // this.posts = response.data.data;
                        // console.log(response.data.data);

                    })
                    .catch((error) => console.log(error))
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
        right: 18px;
        top: 8px;
        -ms-transform: rotate(20deg);
        -webkit-transform: rotate(20deg);
        transform: rotate(20deg);
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

    #sidebar #downloads h4:after {
        content: "\f019";
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

    #bt {
        border-top: 1px solid #ecedee;
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

    .bg-gray {
        background-color: #f1f1f1;
    }

    .color-main {
        color: #038ed4;
    }


    .share i {
        margin-top: 14px;
        font-size: 22px;
        color: #6b6b6b;
        margin-right: 6px;
    }

    @media only screen and (max-width: 500px) {
        #share-social {
            text-align: center;
        }
    }
</style>
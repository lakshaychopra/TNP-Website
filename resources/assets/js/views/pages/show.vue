<template>
    <div>

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
                                            <div class="post-meta-text col-primary " v-html="setDateFormat(post.updated_at)"></div>
                                            <!-- </small> -->
                                        </div>
                                        <div class="pull-right">
                                            <!-- <small> -->
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                            <div class="post-meta-text col-primary ">
                                                <a href="javascript:void(0)" @click="$children[1].searchby_category(post.category)">
                                                    {{post.category}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <img :src="'/images/posts/images/'+post.image" :alt="post.image" width="100%" class="card-image-top">


                    <div class="card-body">
                        <div class="mb-3" v-html="post.body"></div>
                        <div class="clearfix"></div>

                        <div class="post-share">

                            <div class="post-meta" style="background-color: #038ed4;" v-if="!share_fn()">
                                <a href="" @click.prevent="AndroidNativeShare(post.title,post.id,post.category)"><i
                                        class="fa fa-share-alt" style="color:#fff;" aria-hidden="true"></i>
                                    <div style="color:#fff;" class="post-meta-text col-primary " data-toggle="tooltip">
                                        Share</div>
                                </a>


                            </div>
                            <span class="share" v-if="share_fn()">
                                <social-sharing :url="getURL(post.id)" inline-template>
                                    <div style="float:left;">
                                        <network network="facebook">
                                            <i class="fa fa-fw fa-facebook"></i>
                                        </network>
                                        <network network="linkedin">
                                            <i class="fa fa-fw fa-linkedin"></i>
                                        </network>
                                        <network network="twitter">
                                            <i class="fa fa-fw fa-twitter"></i>
                                        </network>
                                    </div>
                                </social-sharing>
                            </span>
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
</template>
<script>
    import helper from '../../services/helper'
    import WidgetRight from './../../layouts/index/rightWidget.vue'
    // import {showPostURL} from "../../config.js";
    export default {
        components: {
            WidgetRight
        },
        data() {
            return {
                post: {},
                id: this.$route.params.id,
                postEdit: {},
                posts: {},
            }
        },
        created() {
            if (typeof navigator.share === 'undefined' || !navigator.share) {
                this.share = true;
                // alert('Your browser does not support Android Native Share, it\'s tested on chrome 63+');
            }
            // else if(window.location.protocol !='https:') {
            //     alert('Android Native Share support only on Https:// protocol');
            //     this.share = true
            // }
            else {
                this.share = false;
            }
            console.log(this.id);
            axios.get('/api/home/view/' + this.id).then((response) => {
                    this.post = response.data.data.data[0];
                    console.log(this.post);
                })
                .catch((error) => console.log(error))
        },
        methods: {
            getURL(id) {
                return "https://www.tnpgndec.com/view/" + id;
            },
            share_fn() {
                return this.share;
            },
            AndroidNativeShare(Title, URL, Description) {
                console.log(Title);
                console.log(Description);

                if (typeof navigator.share === 'undefined' || !navigator.share) {
                    alert('Your browser does not support Android Native Share, it\'s tested on chrome 63+');
                }
                // else if(window.location.protocol !='https:') {
                //     alert('Android Native Share support only on Https:// protocol');
                //     this.share = true
                // }
                else {
                    if (typeof URL === 'undefined') {
                        URL = window.location.href;
                    }
                    if (typeof Title === 'undefined') {
                        Title = document.title;
                    }
                    if (typeof Description === 'undefined') {
                        Description = 'Share your thoughts about ' + Title;
                    }
                    let URLConst = document.location.href + 'view/' + URL;
                    const canonicalElement = document.querySelector('link[rel=canonical]');
                    if (canonicalElement !== null) {
                        URLConst = canonicalElement.href;
                    }
                    const TitleConst = 'Post One';
                    const DescriptionConst = Description;
                    console.log(URLConst);
                    if (navigator.share) {
                        navigator.share({
                                title: TitleConst,
                                text: DescriptionConst,
                                url: URLConst,
                            })
                            .then(() => console.log('Successful share'))
                            .catch((error) => console.log('Error sharing', error));
                    }
                }
            },
            setDateFormat(date) {
                return helper.formatDateTime(date);
            },
            gethtml(text) {
                var maxLength = 400 // maximum number of characters to extract
                //trim the string to the maximum length
                var trimmedString = text.substr(0, maxLength);
                //re-trim if we are in the middle of a word
                trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))
                return trimmedString;
            },
            getrecord(record) {
                this.posts = record.data.data.data;
            },
            // searchPost(){
            //     if(this.search.length >=3){
            //         axios.get(searchURL+this.search)
            //             .then(response => this.posts = response.data.data.data)
            //     }
            //     else{
            //         this.getPosts();
            //     }
            // },        
            getImage(index) {
                return "background: url(/images/posts/images/" + index +
                    ") center no-repeat;    background-size: cover;";
            },
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

    .bg-gray {
        background-color: #f1f1f1;
    }

    .color-main {
        color: #038ed4;
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
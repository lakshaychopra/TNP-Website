<template>
    <div class="sticky-top">
        <nav class="navbar navbar-expand-xl bg-dark navbar-dark">
            <!-- Brand -->
            <router-link to="/" class="navbar-brand d-none d-md-block">
                <img src="/logo.png" alt="logo" height="55px" width="55px"> <strong>Training & Placement Cell</strong>
            </router-link>
            <router-link to="/" class="navbar-brand d-md-none">
                <img src="/logo.png" alt="logo" height="55px" width="55px">
            </router-link>
            <div class="navbar-header">
                <!-- Navbar links -->
                <div class="navbar-text d-xl-none">
                    <ul class="navbar-nav list-inline">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" @click="search_input = !search_input">
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
                <div class="mr-auto d-none d-xl-block w-65" v-if="this.searchbox=true">
                    <form class="form-inline" action="/" method="GET">
                        <input class="form-control" type="text" placeholder="Search" v-model="search" @keyup="searchPost"
                            autocomplete="on" id="search">
                        <a class="nav-link float-right" href="javascript:void(0)" data-target="#more" id="caret" data-toggle="collapse">
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="bgcolor w-90 text-uppercase collapse" id="more">
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
                <ul class="nav navbar-nav" id="list-menu">
                    <li class="nav-item">
                        <router-link to="/about" class="nav-link float-right">
                            <a>
                                <i class="fa fa-users" aria-hidden="true"></i> About
                            </a>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/login" class="nav-link float-right">
                            <a v-if="this.$store.state.auth.username">
                                <i class="fa fa-home" aria-hidden="true"></i> Profile
                            </a>
                            <a v-else>
                                <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                            </a>
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
        <form action="/" method="GET" v-on:submit.prevent v-if="search_input" class="d-xl-none">
            <div class="col-md-12 BGWhite">
                <div class="row px-3 py-2">
                    <input class="form-control" type="text" v-model="search" @keyup="searchPost" autocomplete="on"
                        placeholder="Search" id="search-med">
                        <!-- <a href="javascript:void(0)" data-target="#more-med" id="caret-med" data-toggle="collapse">
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="w-100 bgcolor text-uppercase collapse" id="more-med">
                            <div class="owl-carousel" id="nav-med">
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
                        </div> -->
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import {
        categoryURL,
        searchURL
    } from "../../config.js";
    export default {
        props: ['searchbox'],
        data() {
            return {
                search_input: false,
                search: '',
            }
        },
        methods: {
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
        beforeCreate() {
            var vm = this;
            Vue.nextTick(function () {
                $("#nav").owlCarousel({
                    autoWidth: true,
                    margin: 45,
                    stagePadding: 50,
                });
            }.bind(vm)),
            Vue.nextTick(function () {
                $("#nav-med").owlCarousel({
                    autoWidth: true,
                    margin: 45,
                    stagePadding: 50,
                });
            }.bind(vm));
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

    .btn {
        line-height: 1.5 !important;
    }

    .BGWhite {
        background-color: #fff !important;
    }

    #list-menu li a {
        color: #f7fbff;
        padding: 10px;
        float: left;
        border-bottom: 4px solid rgba(255, 255, 255, 0);
    }

    #list-menu li a:hover {
        /* color: #0073BC; */
        /* border-bottom: 4px solid #0073BC; */
        background-color: #f1f1f1;
        color: #038ed4;
    }

    #caret {
        color: #f7fbff !important;
        padding: 10px;
        border-bottom: 4px solid rgba(255, 255, 255, 0);
    }

    #caret :hover {
        background-color: #f1f1f1 !important;
        color: #038ed4 !important;
    }

    #caret-med {
        color: #038ed4 !important;
        padding: 10px;
        border-bottom: 4px solid rgba(255, 255, 255, 0);
    }

    #caret-med :hover {
        background-color: #038ed4 !important;
        color: #ffffff !important;
    }

    #search {
        background-color: #fff;
        border: solid #038ed4;
        width: 90%;
        color: #0073BC;
        border-radius: 25px;
    }

    #search::placeholder {
        color: #0073BC;
    }

    #search-med {
        background-color: #fff;
        border: solid #038ed4;
        width: 100%;
        color: #0073BC;
        border-radius: 25px;
    }

    #search-med::placeholder {
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

    .bgcolor {
        background-color: #000;
    }

    .w-90 {
        width: 90%;
    }

    #nav {
        margin-bottom: 0;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
    }

    #nav a{
        color: #038ed4 !important;
    }

    #nav a:hover {
        background-color: #f1f1f1 !important;
        color: #038ed4 !important;
    }

    #more {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom:-2px;
    }

    #nav-med {
        margin-bottom: 0;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
    }

    #nav-med a{
        color: #038ed4 !important;
    }

    #nav-med a:hover {
        background-color: #f1f1f1 !important;
        color: #038ed4 !important;
    }

    #nav-med .owl-carousel{
        display: block !important;
    }
    
    #more-med {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom:-2px;
    }
</style>
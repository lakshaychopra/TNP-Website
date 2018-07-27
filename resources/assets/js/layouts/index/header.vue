<template>
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
                    <div class="mr-auto d-none d-md-block w-65" v-if="this.searchbox=true">
                        <form class="form-inline" action="/" method="GET">
                            <input class="form-control" type="text" placeholder="Search" v-model="search" @keyup="searchPost" autocomplete="on" id="search">
                            <!-- <button class="btn btn-info" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button> -->
                        </form>
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
            <form action="/" method="GET" v-if="search_input" class="d-sm-none">
                <div class="row bg-col-grey">
                    <div class="col-md-1">
                        <input id="mr-btm-10" class="form-control" type="text" v-model="search" @keyup="searchPost" autocomplete="on" placeholder="Search">
                    </div>
                </div>
            </form>
        </div>
</template>
<script>
    import {
        searchURL
    } from "../../config.js";
export default {
    props: ['searchbox'],
    data(){
        return{
            search_input: false,
            search : '',
        }
    },
    methods:{
            searchPost() {
                if (this.search.length >= 3) {
                    axios.get(searchURL + this.search)
                        .then(response => this.$parent.posts = response.data.data.data,

                        this.$parent.pinned_posts = undefined
                        )
                } else {
                    this.$parent.getPosts();
                    this.$parent.getPinnedPosts();
                }
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

</style>

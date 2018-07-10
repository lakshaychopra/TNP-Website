<template>
    <div>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand d-none d-md-block" href="/">Training &amp; Placement Cell</a>
            <a class="navbar-brand d-md-none" href="/">T&amp;P Cell</a>
            <div class="navbar-header">
                <!-- Navbar links -->
                <div class="navbar-text d-md-none">
                    <ul class="navbar-nav list-inline">
                        <li class="nav-item ">
                            <a class="nav-link" href="#" @click="search = !search">
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
                <div class="mr-auto d-none d-md-block w-75">
                    <form class="form-inline" action="/">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search">
                        <button class="btn btn-info" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <ul class="nav navbar-nav" id="list-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="fa fa-users" aria-hidden="true"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <form action="/" method="GET" v-if="search" class="d-sm-none">
            <div class="row bg-col-grey">
                <div class="col-md-11">
                    <input id="mr-btm-10" class="form-control mr-sm-2" type="text" placeholder="Search">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-block btn-info" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                search: false
            }
        }
    }
</script>

<style>
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
        border-bottom: 4px solid #ffffff;
    }

    #list-menu li a:hover {
        color: #0073BC;
        border-bottom: 4px solid #0073BC;
    }

    #search {
        background-color: #fff;
        border-color: #0073BC;
        width: 88%;
        color: #0073BC;
    }

    #search::placeholder {
        color: #0073BC;
    }

    .navbar {
        padding: 0 1rem;
    }
</style>
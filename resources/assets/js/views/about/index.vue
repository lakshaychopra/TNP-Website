<template>
    <div>
        <div class="sticky-top" style="z-index:1022;">
            <nav class="navbar bg-dark navbar-dark">
                <!-- Brand -->
                <router-link class="navbar-brand d-none d-md-block" to="/">
                    <img src="/logo.png" alt="logo" height="55px" width="55px"> <strong>Training & Placement Cell</strong>
                </router-link>
                <router-link class="navbar-brand d-md-none" to="/">
                    <img src="/logo.png" alt="logo" height="55px" width="55px">
                </router-link>
                <div class="navbar-header">
                    <!-- Navbar links -->
                    <div class="navbar-text d-md-none">
                        <ul class="navbar-nav list-inline">
                            <li class="nav-item ">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar">
                    <div class="mr-auto d-none d-md-block w-65">

                    </div>
                    <ul class="nav navbar-nav" id="list-menu">
                        <li class="nav-item">
                            <router-link to="/" class="pull-right nav-link">
                                <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back
                            </router-link>
                            <a class="nav-link float-right" href="#" data-target="#more" data-toggle="collapse">
                                More <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="w-100 p-2 font bgcolor textcolor collapse" id="more">
                    <div class="owl-carousel" id="nav-carousel">
                        <div>
                            <p>
                                <router-link to="/">Home</router-link>
                            </p>
                        </div>
                        <div>
                            <p>
                                <router-link to="/login">Login</router-link>
                            </p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>HOME</p>
                        </div>
                        <div>
                            <p>
                                <router-link to="/genconian">Developer and Contributers</router-link>
                            </p>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!--
*************
NAVBAR
*************
-->


        <!--
         ############
         image
         ############
         -->
        <div class="row mb-5 mx-0" style="position:relative">
            <div class="bgimage">
                <div class="mb-5 ml-5 mr-5 bottom-left">
                    <h1 class="text-color12">Training &amp; Placement Cell</h1>
                    <h5 class="text-color12 text-justify">
                        The goal of Training & Placement Cell is to provide students with a platform for using their
                        potential to gain valuable experience by working in industry ,it also acts as the interface
                        between various companies seeking talented young graduates and post graduates in various
                        disciplines.
                    </h5>
                </div>
            </div>
        </div>
        <!--
         ##########################
         career development
         ##########################
         -->
        <div class="container">
            <div class="row mb-5 ">
                <div class="col-md-12  text-center  mt-5  mb-5">
                    <h2>
                        <strong>Career Development</strong>
                    </h2>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/about/img/image1.jpg" alt="image" width="100%" />
                            </div>
                            <div class="card-title text-center mt-2">
                                <h5>Experienced Professionals</h5>
                            </div>
                            <div class="card-body text-justify">
                                <p>T&amp;P lets you draw upon its superlative treasure of experience.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/about/img/image2.jpg" alt="image" width="100%" />
                            </div>
                            <div class="card-title text-center mt-2">
                                <h5>Entry Level Hiring</h5>
                            </div>
                            <div class="card-body text-justify">
                                <p>Stay ahead of the race by giving your career a kickstart with T&amp;P.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/about/img/image3.jpg" alt="image" width="100%" />
                            </div>
                            <div class="card-title text-center mt-2">
                                <h5>Campus Commune</h5>
                            </div>
                            <div class="card-body text-justify">
                                <p>'Campus Meets Corporate' via digital channels to engage with T&amp;P.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
         ##########################
         our heritage and values
         ##########################
         -->
        <div class="row text-color12 text-center mb-5 mx-0">
            <div class="bgimage2">
                <div class="p-top">
                    <h2 class="text-color12">
                        <strong>Our Heritage and Values</strong>
                    </h2>
                    <h5 class="text-color12">
                        <strong>We're proud of our heritage and values based on creativity and innovation.Discover the
                            best platform
                            to solidify your career.</strong>
                    </h5>
                    <div class="mt-3">
                        <button class="btn btn-primary pt-2 pb-2 px-3">Discover</button>
                    </div>
                </div>
            </div>
        </div>
        <!--
         ##########################
         news and highlights
         ##########################
         -->
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h1>News And Highlights</h1>
                    <div id="bor-left" class="mb-3 mt-3">
                        <small>CAMPAIGN</small>
                    </div>
                    <h6>Press Releases</h6>
                </div>
                <div class="col-md-10">
                    <div class="col-md-4 float-left">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/about/img/cimage1.jpg" alt="image" width="100%" />
                            </div>
                            <div class="card-title text-center mt-2">
                                <small>CAMPAIGN</small>
                                <h5>Hiring SAP Professionals!</h5>
                            </div>
                            <div class="card-body text-justify ">
                                <p>Collaborate with our top banking customer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 float-right">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/about/img/cimage2.jpg" alt="image" width="100%" />
                            </div>
                            <div class="card-title text-center mt-2">
                                <small>CAMPAIGN</small>
                                <h5>Shape the Future</h5>
                            </div>
                            <div class="card-body text-justify">
                                <p>Develop What's Next with T&amp;P BPS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 float-right">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/about/img/cimage3.jpg" alt="image" width="100%" />
                            </div>
                            <div class="card-title text-center mt-2">
                                <small>CAMPAIGN</small>
                                <h5>The most popular Global!</h5>
                            </div>
                            <div class="card-body text-justify">
                                <p>Register for CodeVista Season 7 Now!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--
         ##########################
         people for T&amp;P
         ##########################
         	-->
        <div class="row mt-5">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="ml-5 mar-top border-left" data-target="#demo" data-slide-to="0">
                            <div>
                                <strong>Prof. G. S. Sodhi</strong>
                                <p>Officer</p>
                                <p>Training &amp; Placement Cell</p>
                            </div>
                            <img src="images/about/img/bg-image2.jpg" alt="Faculty Members of Training and Placement Cell"
                                width="100%">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="ml-5 mar-top" data-target="#demo" data-slide-to="1">
                            <strong>Dr. K. S. Mann</strong>
                            <p>Advisor</p>
                            <p>Training &amp; Placement Cell</p>
                            <img src="images/about/img/bg-image2.jpg" alt="Faculty Members of Training and Placement Cell"
                                width="100%">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="ml-5 mar-top" data-target="#demo" data-slide-to="2">
                            <strong>Prof. Sachin Bagga</strong>
                            <p>Faculty Co-ordinator</p>
                            <p>Training &amp; Placement Cell</p>
                            <img src="images/about/img/bg-image2.jpg" alt="Faculty Members of Training and Placement Cell"
                                width="100%">
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <!--
         ##########################
         social media
         ##########################
         -->
        <div class="container">
            <div class="row mb-5 ">
                <div class="col-md-12  text-center  mt-5">
                    <h2>
                        <strong>Social Media</strong>
                    </h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/about/img/ccimage1.jpg" alt="image" width="100%" height="200px" />
                        </div>
                        <div class="card-title text-center mt-2">
                            <h5>@T&amp;P</h5>
                        </div>
                        <div class="card-body text-justify">
                            <p>Does embracing agile mean having to comprise on quality assurance? Gaurav Gupta, T&amp;P
                                explains
                                how AI and Machine. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/about/img/ccimage2.jpg" alt="image" width="100%" height="200px" />
                        </div>
                        <div class="card-title text-center mt-2">
                            <h5>@T&amp;P</h5>
                        </div>
                        <div class="card-body text-justify">
                            <p>#Business 4.0 technology pillars are all set to rewrite the playbook for managing
                                existing downstream
                                processes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/about/img/ccimage3.jpg" alt="image" width="100%" height="200px" />
                        </div>
                        <div class="card-title text-center mt-2">
                            <h5>@T&amp;P</h5>
                        </div>
                        <div class="card-body text-justify">
                            <p>Learn how our partnership with @ABNAmro helped in its #digitaltransformation to Open.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3  text-center mb-5">
                <button class="btn btn-primary pt-2 pb-2 px-3">Load More</button>
            </div>
        </div>

        <div class="container">
            <div class="row mb-5">
                <div class="owl-carousel">

                    <div>
                        <div class="mb-5 mt-5">
                            <h5>
                                <strong>Placement Agencies</strong>
                            </h5>
                        </div>
                        <div class="mb-5">
                            <p>
                                <strong>Become a business partner in T&amp;P' hunt for talented professionals.</strong>
                            </p>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary btn-block pt-2 pb-2 px-3">Login</button>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5  mt-5">
                            <h5>
                                <strong>T&amp;P Alumni</strong>
                            </h5>
                        </div>
                        <div class="mb-5">
                            <p>
                                <strong>Become a business partner in T&amp;P' hunt for talented professionals.</strong>
                            </p>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary btn-block pt-2 pb-2 px-3">Login</button>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5 mt-5">
                            <h5>
                                <strong>BGC Agency</strong>
                            </h5>
                        </div>
                        <div class="mb-5">
                            <p>
                                <strong>Become a business partner in T&amp;P' hunt for talented professionals.</strong>
                            </p>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary btn-block pt-2 pb-2 px-3">Login</button>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5 mt-5">
                            <h5>
                                <strong>Academic Faculty</strong>
                            </h5>
                        </div>
                        <div class="mb-5">
                            <p>
                                <strong>Manage your faculty account ,stay connected with T&amp;P and more.</strong>
                            </p>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary btn-block pt-2 pb-2 px-3">Login</button>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5 mt-5">
                            <h5>
                                <strong>Training & Placement Officer</strong>
                            </h5>
                        </div>
                        <div class="mb-5">
                            <p>
                                <strong>Manage your TPO account ,stay connected with T&amp;P and more.</strong>
                            </p>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary btn-block pt-2 pb-2 px-3">Login</button>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!--
         ##########################
         footer
         ##########################
	-->
        <footer class="container-fluid footer mt-5" style="left:0">
            <p class="text-center"><small>Developed with <span class="text-danger"><i class="fa fa-heart" aria-hidden="true"></i>
                    </span> by
                    <router-link to="/genconian">Genconians</router-link> | © 2018 <a href="https://www.gndec.ac.in/"
                        target="_blank">GNDEC,
                        Ldh</a></small></p>
        </footer>
    </div>
</template>
<style scoped>
    #more {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .col-primary {
        color: #304156;
    }

    .card-primary {
        background: #fff;
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

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .bgcolor {
        background-color: #000;
    }

    .text-color12 {
        color: #fff !important;
        /* font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; */
    }

    .bgimage {
        background-image: url('/images/about/img/bg-img.jpg');
        width: 100%;
        height: 100vh;
        background-size: cover;
    }

    .bottom-left {
        position: absolute;
        bottom: 8px;
    }

    .bgimage2 {
        background-image: url('/images/about/img/bgimg2.jpg');
        width: 100%;
        height: 580px;
        background-size: cover;
    }


    .bgimage3 {
        background-image: url('/images/about/img/bgimg3.jpg');
        width: 100%;
        height: 500px;
        background-size: cover;
    }

    .p-top {
        padding-top: 400px;
    }

    #bor-left {
        border-left: 4px solid #ef7f11;
        padding-left: 10px;
    }

    #bor-right {
        border-right: 1px solid #000;
        height: 164px;
    }

    #demo .carousel-indicators {
        position: absolute;
        top: 0;
        left: -98px;
        display: block;
        margin-top: 200px;
    }

    #demo .carousel-indicators .active {
        background-color: transparent;
    }

    #demo1 .carousel-indicators li {
        height: 9px;
        width: 10px;
        border-radius: 50%;
        background-color: #017bfc;
    }

    #demo1 .carousel-indicators li.active {
        border: 1px solid #000;
        background-color: transparent;
    }

    .bgcolor3 {
        background-color: #474747;
    }

    .listt ul {
        list-style-type: none;
    }

    .mar-top {
        margin-top: 50px;
    }

    /* CSS used here will be applied after bootstrap.css */

    .closeBtn:focus {
        outline: none;
    }

    .close {
        color: gray;
    }

    .wrapper {
        position: relative;
        margin: 0 auto;
        overflow: hidden;
        padding: 5px;
        height: 50px;
    }

    .list {
        position: absolute;
        left: 0px;
        top: 0px;
        min-width: 3500px;
        margin-top: 0px;
    }

    .list li {
        display: table-cell;
        position: relative;
        text-align: center;
        cursor: grab;
        cursor: -webkit-grab;
        color: #efefef;
        vertical-align: middle;
    }


    @media screen and (max-width:425px) {
        #demo .carousel-indicators {
            top: unset;
        }

        .bgimage {
            height: 645px;
            overflow: hidden;
        }

        .bgimage2 {
            height: 645px;
            overflow: hidden;
        }

        .mar-top {
            margin-top: 10px;
        }
    }

    .bor-left {
        border-left: 1px solid #fff;
        height: 200px;
    }

    .icons {
        border: 1px solid #fff;
        padding: 12px;
        border-radius: 50%;
    }


    #demo p {
        margin-bottom: 0;
    }

    /* a {
        color: #fff;
        font-size: 17px;
    } */

    #nav-carousel p {
        margin-bottom: 0;
        color: #fff;
        font-size: 14px;
    }
</style>
<script>
    import 'owl.carousel2/dist/assets/owl.carousel.css';
    import 'owl.carousel2/dist/owl.carousel.min.js';
    export default {
        data() {
            return {
                nav: false,
            }
        },
        beforeCreate() {
            var vm = this;
            Vue.nextTick(function () {
                $("#nav-carousel").owlCarousel({
                    autoWidth: true,
                    margin: 30,
                    stagePadding: 50,

                });
            }.bind(vm));
            Vue.nextTick(function () {
                $(".owl-carousel").owlCarousel({
                    margin: 10,
                    nav: false,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        480: {
                            items: 3,
                        },
                        768: {
                            items: 3,
                            loop: false
                        }
                    }

                });
            }.bind(vm));

        }
    }
</script>
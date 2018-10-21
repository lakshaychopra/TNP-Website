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

                <div class="w-100 p-2 bgcolor text-uppercase collapse" id="more">
                    <div class="owl-carousel" id="nav">
                        <div>
                            <router-link to="/">Home</router-link>
                        </div>
                        <div>
                            <router-link to="/login">Login</router-link>
                        </div>
                        <div v-for="pg in page" :key="pg.id">
                            <router-link v-bind:to="'/page/'+pg.url">{{ pg.title }}</router-link>
                        </div>
                        <div>
                            <router-link to="/genconian">Developer and Contributers</router-link>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <!--NAVBAR-->

        <!--  image   -->
        <div class="row mb-5 mx-0" style="position:relative">
            <div class="bgimage">
                <div class="mb-5 ml-3 mr-3 bottom-left bgimgtext">
                    <h1>Welcome to Training &amp; Placement Cell</h1>
                    <h5 class="text-justify lead">
                        A family that takes initiatives.
                    </h5>
                </div>
            </div>
        </div>

        <!-- about -->
        <section id="about" class="container">
            <div class="col-md-12 mb-3">
                <div class="row about-intro">
                    <div class="col-md-4 mb-4 text-center">
                        <h1 class="intro-header">About T&amp;P Cell</h1>
                        <img src="/images/icons/256x256.png" alt="logo">
                    </div>
                    <div class="col-md-8">
                        <p class="text-justify lead">
                            The goal of Training & Placement Cell is to provide students with a platform for using
                            their
                            potential to gain valuable experience by working in industry ,it also acts as the interface
                            between various companies seeking talented young graduates and post graduates in various
                            disciplines. The Cell is well equipped with ample infrastructure in Terms of Testing halls,
                            Consultancy Hall,Conference room, for Pre Placement Talk, Presentations etc and Computer
                            labs
                            for online tests also the cell has video conference facility available for the students.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3 about-features">
                <div class="row about-intro">
                    <div class="col-md-4 mt-3 mb-3">
                        <span class="icon"><i class="icon-window"></i></span>
                        <h2>Training</h2>
                        <p class="text-justify lead">The cell arranges training for students in industries for 6 weeks
                            at the end of 4th
                            Semester and for 6 months in 7th or 8th Semester. All the Engineering Department
                            students undergo minimum 12 weeks for industrial training and minimum 6 weeks for
                            software training for this 6 months of training.
                        </p>
                    </div>

                    <div class="col-md-4 mt-3 mb-3">

                        <span class="icon"><i class="icon-image"></i></span>

                        <h2>Placements</h2>

                        <p class="text-justify lead">All the reputed organizations including MNCs come to the College
                            for campus recruitment.
                            To achieve its goal, the Training & Placement Cell works towards recognizing the core
                            competencies of students.
                        </p>

                    </div>

                    <div class="col-md-4 mt-3 mb-3">

                        <span class="icon"><i class="icon-paint-brush"></i></span>

                        <h2>Additional Activities</h2>

                        <p class="text-justify lead">In addition to the above-mentioned activities, the cell arranges
                            expert lectures of
                            Corporate Managers in both Technical and HRD streams for the students and faculty of
                            the Institute. There are various Workshops and Seminars organised for the benefit of
                            students regarding the latest trend and technology in the industry.
                        </p>
                    </div>
                </div> <!-- end features-list -->
            </div> <!-- end about-features -->
        </section> <!-- end about -->

        <!--career development-->
        <div class="container">
            <div class="row mb-3 mt-5 about-intro">
                <div class="col-md-12 mb-3 pb-0 text-center">
                    <h1 class="intro-header">Career Development</h1>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/about/img/image1.jpg" alt="image" width="100%" />
                        </div>
                        <div class="card-title text-center mt-2">
                            <h3>Experience Professionalism</h3>
                        </div>
                        <div class="card-body text-justify">
                            <p class="lead">T&amp;P lets you draw upon its superlative treasure of experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/about/img/image2.jpg" alt="image" width="100%" />
                        </div>
                        <div class="card-title text-center mt-2">
                            <h3>Knowledge Entry Level Hiring</h3>
                        </div>
                        <div class="card-body text-justify">
                            <p class="lead">Stay ahead of the race by giving your career a kickstart with T&amp;P.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/about/img/image3.jpg" alt="image" width="100%" />
                        </div>
                        <div class="card-title text-center mt-2">
                            <h3>Campus Communes</h3>
                        </div>
                        <div class="card-body text-justify">
                            <p class="lead">'Campus Meets Corporate' via channels to engage with T&amp;P.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--news and highlights-->
        <div class="col-md-12 mb-5 d-lg-none text-center">
            <h1 class="intro-header">News And Highlights</h1>
        </div>
        <section class="container">
            <div class="row about-intro mb-5">
                <div class="col-md-2 d-none d-lg-block">
                    <h1>News And Highlights</h1>
                    <div class="bor-left mb-3 mt-3">
                        <small>POSTS</small>
                    </div>
                </div>
                <div class="col-md-10 col-xs-12">
                    <div class="owl-carousel" id="news">
                        <div class="col-md-4 float-left item" v-for="post in posts" :key="post.id">
                            <router-link v-bind:to="'/view/'+post.id">
                                <div class="card">
                                    <div class="card-news">
                                        <img src="images/about/img/bgtnp.png" alt="image" width="100%" />
                                    </div>
                                    <div class="card-title text-center mt-2">
                                        <small>{{post.category}}</small>
                                        <h5>{{post.title}}</h5>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-md-12">
            <div class="container">
                <div class="about-intro about-how">
                    <h1 class="intro-header">How T&amp;P Cell Works?</h1>
                    <div class="about-how-content">
                        <div class="about-how-steps">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 step" data-item="1">
                                        <h2>Database Formation</h2>
                                        <p class="text-justify lead">Collects the record of students of particular
                                            year and forms database
                                            that MNCs demand
                                            as a record from the institution.
                                        </p>
                                    </div>
                                    <div class="col-md-6 step" data-item="2">
                                        <h2>Finding Contacts</h2>
                                        <p class="text-justify lead">Fetches contacts of Human Resource Managers of
                                            different Companies to
                                            get information
                                            regarding job offering for students by their organisations.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 step" data-item="3">
                                        <h2>Getting Confirmations</h2>
                                        <p class="text-justify lead">Training and Placement cell gets confirmation
                                            from HRs for conducting
                                            placement
                                            drive on
                                            particular dates as per directed and arranging hospitality services and
                                            venue.
                                        </p>
                                    </div>
                                    <div class="col-md-6 step" data-item="4">
                                        <h2>Placement Drives</h2>
                                        <p class="text-justify lead">Smoothly conducts placement drive for the
                                            students by different MNCs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end about-how-content -->
                </div> <!-- end about-how -->
            </div>
        </section>

        <!-- Words from TPO-->
        <section id="testimonials" class="container pb-0 about-intro">
            <div class="col-md-12">
                <div class="mb-5 mt-5">
                    <h1 class="intro-header"> Words From Training And Placement Officer</h1>
                </div>
            </div>
            <div id="testimonial-slider">
                <p class="lead text-center">
                    "The Training and Placement Cell, GNDEC apart from giving an outstanding placement
                    record provides the platform for students to gain most from the personality development
                    and marketing experience program. We focus on not just creating engineers but pioneers
                    and leaders for the future development of our nation. The Training &amp; Placement Cell
                    looks after the interests of the students and the recruiting organizations by acting as
                    a channel of communication between them."
                </p>
                <div class="testimonial-author">
                    <img src="images/about/img/tpo.jpg" alt="Author image">
                    <div class="author-info">
                        Prof. G.S. Sodhi
                        <span class="position"> Training And Placement Officer </span>
                    </div>
                </div>
            </div> <!-- end testimonial-slider -->
        </section> <!-- end testimonials -->

        <!--  people for T&amp;P-->
        <div class="col-md-12 mt-5 mb-5 text-center ">
            <h1 class="intro-header"> Our Faculty Members</h1>
        </div>
        <div id="demo" class="carousel slide about-intro" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div data-target="#demo" data-slide-to="0">
                        <img src="images/about/img/sodhi.jpg" alt="Faculty Members of Training and Placement Cell"
                            class="owl-img" width="100%">
                        <div class="owl--text">
                            <strong>Prof. G. S. Sodhi</strong>
                            <p>Officer</p>
                            <p>Training &amp; Placement Cell</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item">
                    <div data-target="#demo" data-slide-to="1">
                        <img src="images/about/img/bg-image2.jpg" alt="Faculty Members of Training and Placement Cell"
                            class="owl-img" width="100%">
                        <div class="owltext">
                            <strong>Dr. K. S. Mann</strong>
                            <p>Advisor</p>
                            <p>Training &amp; Placement Cell</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div data-target="#demo" data-slide-to="2">
                        <img src="images/about/img/bagga.jpeg" alt="Faculty Members of Training and Placement Cell"
                            class="owl-img" width="100%">
                        <div class="owltext">
                            <strong>Prof. Sachin Bagga</strong>
                            <p>Faculty Co Cordinator</p>
                            <p>Training &amp; Placement Cell</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


        <!-- Companies -->
        <section class="testimonials pb-0 mb-3 mt-5">
            <div class="container">
                <div class="row about-intro">
                    <div class="col-md-12 text-center mt-3 mb-3">
                        <h1 class="intro-header">Companies Visiting Our Campus</h1>
                    </div>
                    <div class="col-sm-12">
                        <div id="customers-testimonials" class="owl-carousel">
                            <!--TESTIMONIAL 1 -->
                            <div class="item">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="/images/companies/accenture.png" alt="faculty member">
                                    <div class="item-details">
                                        <h3>Accenture</h3>
                                    </div>
                                </div>
                            </div>
                            <!--END OF TESTIMONIAL 1 -->
                            <!--TESTIMONIAL 2 -->
                            <div class="item">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="/images/companies/infosys.jpg" alt="faculty member">
                                    <div class="item-details">
                                        <h3>Infosys</h3>
                                    </div>
                                </div>
                            </div>
                            <!--END OF TESTIMONIAL 2 -->
                            <!--TESTIMONIAL 3 -->
                            <div class="item">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="/images/companies/cummins.png" alt="faculty member">
                                    <div class="item-details">
                                        <h3>Cummins</h3>
                                    </div>
                                </div>
                            </div>
                            <!--END OF TESTIMONIAL 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF TESTIMONIALS -->

        <!--footer-->
        <footer class="container-fluid footer mt-3" style="left:0">
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

    .navbar {
        padding: 0 1rem;
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
    }

    .bgimage {
        background-image: url('/images/about/img/bgimg.jpg');
        width: 100%;
        height: 75vh;
        background-size: cover;
    }

    .bgimgtext {
        position: absolute;
        background: rgba(255, 255, 255, .5);
        border-radius: 5px;
        padding: 1em;
    }

    .bottom-left {
        position: absolute;
        bottom: 8px;
    }

    #demo .carousel-indicators {
        position: absolute;
        top: 0;
        left: -98px;
        display: block;
        margin-top: 200px;
    }

    #demo .owl-img {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    #demo .owl-carousel {
        position: relative;
        height: 100%;
    }

    #demo .carousel-indicators .active {
        background-color: transparent;
    }

    #demo .owl--text {
        position: absolute;
        bottom: 3em;
        left: 2em;
        width: 15em;
        height: 6em;
        padding: 1em;
        background: rgba(255, 255, 255, .8);
        border-radius: 4px;
    }

    #demo .carousel-indicators li {
        height: 9px;
        width: 10px;
        border-radius: 50%;
        background-color: #017bfc;
    }

    #demo .carousel-indicators li.active {
        border: 1px solid #000;
        background-color: transparent;
    }

    @media screen and (max-width:426px) {
        #demo .owl--text {
            position: absolute;
            bottom: 0.5em;
            left: 0.5em;
            width: 14em;
            height: 6em;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 4px;
        }

        #demo .carousel-indicators {
            top: unset;
        }
    }

    .card-news {
        border: solid #038ed4 2px;
        border-radius: 15px;
    }

    .bor-left {
        border-left: 4px solid #ef7f11;
        padding-left: 10px;
    }

    #demo p {
        margin-bottom: 0;
    }


    #nav p {
        margin-bottom: 0;
        color: #fff;
        font-size: 14px;
    }

    #nav .carousel-indicators {
        position: absolute;
        top: 0;
        left: -98px;
        display: block;
        margin-top: 200px;
    }

    #nav .carousel-indicators .active {
        background-color: transparent;
    }

    #nav .carousel-indicators li {
        height: 9px;
        width: 10px;
        border-radius: 50%;
        background-color: #017bfc;
    }

    #nav .carousel-indicators li.active {
        border: 1px solid #000;
        background-color: transparent;
    }


    #customers-testimonials .testimonials {
        background-color: #fff;
        position: relative;
        padding-top: 60px;
    }

    #customers-testimonials .testimonials:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 30%;
        background-color: #f1f1f1;
    }

    #customers-testimonials .item-details {
        background-color: #333333;
        color: #fff;
        padding: 20px 10px;
        text-align: left;
    }

    #customers-testimonials .item-details h3 {
        margin: 0 0 15px;
        font-size: 18px;
        line-height: 18px;
        color: #fff;
        text-align: center;
    }


    #customers-testimonials .item-details h3 span p {
        font-size: 14px;
    }

    #customers-testimonials .item {
        text-align: center;
        /*  padding: 20px; */
        margin-bottom: 80px;
    }

    #customers-testimonials .owl-carousel .owl-nav {
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
    }

    #customers-testimonials .owl-carousel {
        position: relative;
    }

    #customers-testimonials .owl-carousel .owl-next,
    #customers-testimonials .owl-carousel .owl-prev {
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        position: absolute;
        top: 30%;
        font-size: 20px;
        color: #fff;
        border: 1px solid #ddd;
        text-align: center;
    }

    #customers-testimonials .owl-carousel .owl-prev {
        left: -70px;
    }

    #customers-testimonials .owl-carousel .owl-next {
        right: -70px;
    }

    /* ===================================================================
 * about - (_layout.scss)
  ------------------------------------------------------------------- */

    #about {
        min-height: 786px;
        background: #ffffff;
        overflow: hidden;
    }

    .about-intro {
        padding-bottom: 3.6rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.07);
    }


    .about-features .icon {
        margin-bottom: 1.5rem;
        display: inline-block;
    }

    .about-features .icon i {
        color: #038ed4;
        font-size: 4.8rem;
    }

    .about-features h3 {
        font-size: 1.9rem;
        color: #151515;
        margin-bottom: 3rem;
    }


    h1.intro-header {
        text-align: center;
    }

    h1.intro-header::before {
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .about-how-content {
        position: relative;
        width: 100%;
        max-width: 1000px;
        min-height: 300px;
        margin-top: 3.2rem;
        margin-left: auto;
        margin-right: auto;
        clear: both;
    }

    .about-how-content::before,
    .about-how-content::after {
        content: "";
        display: block;
        width: 1px;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 0;
    }

    .about-how-content::before {
        left: 0;
    }

    .about-how-content::after {
        left: 50%;
    }

    .about-how-content .about-how-steps {
        width: 100%;
    }

    .about-how-content .step {
        padding: 0 40px 1.5rem 60px;
        position: relative;
        min-height: 240px;
    }

    .about-how-content .step h3 {
        margin-bottom: 2.4rem;
    }

    .about-how-content .step::before {
        display: block;
        font-size: 2rem;
        content: attr(data-item);
        color: #ffffff;
        height: 54px;
        width: 54px;
        line-height: 54px;
        text-align: center;
        border-radius: 50%;
        background-color: #038ed4;
        box-shadow: 0 0 0 15px #ffffff;
        z-index: 500;
        position: absolute;
        top: -12px;
        left: -27px;
    }

    .about-bottom-image img {
        vertical-align: bottom;
    }


    /* ------------------------------------------------------------------- 
 * responsive:
 * about 
 * ------------------------------------------------------------------- */

    @media only screen and (max-width: 1200px) {
        .about-how-content {
            max-width: 800px;
        }
    }

    @media only screen and (max-width: 1024px) {
        .about-intro {
            max-width: 800px;
            text-align: center;
        }

        .about-intro h1::before {
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }

        .about-intro [class*="col-"] {
            width: 100% !important;
            float: none !important;
            clear: both !important;
            margin-left: 0;
            margin-right: 0;
        }

        .about-how-content {
            max-width: 700px;
        }
    }

    @media only screen and (max-width: 850px) {
        .about-how-content {
            max-width: 550px;
        }

        .about-how-content::after {
            display: none;
        }

        .about-how-content .step {
            width: 100% !important;
            float: none !important;
            clear: both !important;
            margin-left: 0;
            margin-right: 0;
            padding-right: 18px;
            min-height: auto;
            padding: 0 40px .9rem 60px;
        }
    }

    @media only screen and (max-width: 768px) {
        .about-features .icon i {
            font-size: 4.4rem;
        }

        .about-features h3 {
            font-size: 1.8rem;
        }

        .about-how h3 {
            font-size: 1.9rem;
        }

        .about-how-content::before {
            left: 30px;
        }

        .about-how-content .step {
            padding: 0 10px 0 80px;
        }

        .about-how-content .step::before {
            font-size: 1.6rem;
            height: 45px;
            width: 45px;
            line-height: 45px;
            top: -9px;
            left: 7.5px;
        }
    }

    @media only screen and (max-width: 650px) {
        .about-features {
            max-width: 600px;
            text-align: center;
        }

        .about-features {
            width: 100% !important;
            float: none !important;
            clear: both !important;
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 4.5rem;
        }

        .about-features h3 {
            margin-bottom: 1.5rem;
        }
    }

    @media only screen and (max-width: 400px) {
        .about-how-content {
            text-align: center;
        }

        .about-how-content::before {
            display: none;
        }

        .about-how-content .step {
            padding: 60px 0 0 0;
        }

        .about-how-content .step::before {
            top: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }
    }

    .lead {
        font-size: 1.5rem;
    }

    /* ===================================================================
 *  testimonials - (_layout.scss)
 ------------------------------------------------------------------- */

    #testimonials {
        background: #FFFFFF;
        text-align: center;
        min-height: 600px;
    }

    #testimonials h1::before {
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    #testimonials .owl-wrap {
        width: 80%;
        max-width: 900px;
        margin: 4.2rem auto 0;
    }

    #testimonial-slider {
        margin: 0 0 3rem 0;
        position: relative;
    }

    #testimonial-slider .testimonial-author {
        margin-top: 3.2rem;
    }

    #testimonial-slider .testimonial-author img {
        width: 7.4rem;
        height: 7.4rem;
        margin: 0 auto 1.2rem auto;
        display: block;
        border-radius: 50%;
    }

    #testimonial-slider .testimonial-author .author-info {
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        font-size: 1.9rem;
        color: #151515;
    }

    #testimonial-slider .testimonial-author .author-info span {
        display: block;
        font-size: 1.6rem;
        line-height: 1.313;
        letter-spacing: 0;
        text-transform: none;
        color: rgba(0, 0, 0, 0.5);
    }


    /* ------------------------------------------------------------------- 
 * testimonials
 * ------------------------------------------------------------------- */


    @media only screen and (max-width: 768px) {
        #testimonial-slider .testimonial-author img {
            width: 6.6rem;
            height: 6.6rem;
        }

        #testimonial-slider .testimonial-author .author-info {
            font-size: 1.8rem;
        }

        #testimonial-slider .testimonial-author .author-info span {
            font-size: 1.5rem;
        }
    }

    @media only screen and (max-width: 600px) {
        #testimonials .owl-wrap {
            width: 90%;
        }
    }

    @media only screen and (max-width: 400px) {
        #testimonials .owl-wrap {
            width: 100%;
        }
    }
</style>
<script>
    import 'owl.carousel2/dist/assets/owl.carousel.css';
    import 'owl.carousel2/dist/owl.carousel.min.js';
    import {
        pageLinkWidget,
        addHomePostURL
    } from "../../config.js";
    export default {
        data() {
            return {
                nav: false,
                page: {},
                posts: {},
            }
        },
        created() {
            axios.get(pageLinkWidget)
                .then((response) => {
                    this.page = response.data.data.data;
                })
                .catch((error) => console.log(error))
            axios.get(addHomePostURL)
                .then((response) => {
                    this.posts = response.data.data.data;
                })
                .catch((error) => console.log(error))
        },

        beforeCreate() {
            var vm = this;
            Vue.nextTick(function () {
                $("#nav").owlCarousel({
                    autoWidth: true,
                    margin: 30,
                    stagePadding: 50,
                });
            }.bind(vm));
            Vue.nextTick(function () {
                $("#news").owlCarousel({
                    loop: true,
                    center: false,
                    items: 3,
                    margin: 10,
                    autoplay: false,
                    dots: false,
                    nav: false,
                    autoplayTimeout: 8500,
                    smartSpeed: 600,
                    lazyLoad: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1170: {
                            items: 3
                        }
                    }
                });
            }.bind(vm));
            Vue.nextTick(function () {
                $('#customers-testimonials').owlCarousel({
                    loop: true,
                    center: true,
                    items: 3,
                    margin: 30,
                    autoplay: true,
                    dots: false,
                    nav: false,
                    autoplayTimeout: 8500,
                    smartSpeed: 600,
                    lazyLoad: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1170: {
                            items: 3
                        }
                    }
                });
            }.bind(vm));
        }
    }
</script>
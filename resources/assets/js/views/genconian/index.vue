<template>
    <div>
        <nav class="navbar bg-dark navbar-dark">
            <!-- Brand -->
            <router-link to="/" class="navbar-brand d-none d-md-block">
                <img src="/logo.png" alt="logo" height="55px" width="55px"> <strong>Training & Placement Cell</strong>
            </router-link>
            <router-link to="/" class="navbar-brand d-md-none">
                <img src="/logo.png" alt="logo" height="55px" width="55px">
            </router-link>

            <ul class="nav navbar-nav" id="list-menu">
                <li class="nav-item">
                    <router-link to="/" class="pull-right nav-link">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back
                    </router-link>
                </li>
            </ul>
        </nav>


        <!-- Team -->
        <section id="team" class="mb-5">
            <div class="container">
                <h5 class="section-title h1">THE TEAM</h5>
                <div class="row">
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="/images/genconian/sanjam.jpeg" alt="card image"></p>
                                    <h4 class="card-title">Sanjampreet Singh</h4>
                                    <p class="card-subtitle">Developer</p>
                                    <p class="card-text">He is a Genconian. He is a B.Tech student in Information
                                        Technology of 2015-19 batch. He is Co-Cordinator of Training and Placement
                                        Cell. He has been working day-night on T&amp;P Cell's website for college
                                        students. He has worked as Developer on the PWA and Restful APIs of <a href="https://www.tnpgndec.com">T&amp;P
                                            Cell's website.</a></p>
                                    <ul class="list-inline" id="list-link">
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.facebook.com/sanjampreet.singh1    ">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://twitter.com/Itzrealsanjam">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.linkedin.com/in/sanjampreetsingh/">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.instagram.com/sanjampreetsingh_/">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="mailto:sanjam531@gmail.com">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="/images/genconian/karamveer.jpg" alt="card image"></p>
                                    <h4 class="card-title">Karamveer Singh</h4>
                                    <p class="card-subtitle">Developer</p>
                                    <p class="card-text">He is a Genconian. He is a B.Tech student in Computer Science
                                        and Engineering of 2015-19 batch. He has been working day-night on T&amp;P
                                        Cell's website for college students. He has worked as Developer on the SPA and
                                        Vue.js part of <a href="https://www.tnpgndec.com">T&amp;P Cell's website</a>.
                                        He is not even a member of T&amp;P Cell and has contributed a lot to the
                                        website.</p>
                                    <ul class="list-inline" id="list-link">
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.facebook.com/loveforeverKM">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.twitter.com/kmvsingh007">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.linkedin.com/in/singh-karamveer/">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="https://www.instagram.com/honey_singh008/">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" target="_blank" href="mailto:kmvsingh007@gmail.com">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                </div>
            </div>
        </section>
        <!-- Team -->

        <footer class="row footer mt-5" style="left:0">
        <div class="container">
            <p class="text-center"><small>Developed with <span class="text-danger"><i class="fa fa-heart" aria-hidden="true"></i>
                    </span> by
                    <a href="#">Genconians</a> | © 2018 <a href="https://www.gndec.ac.in/" target="_blank">GNDEC, Ldh</a></small></p>
        </div>
        </footer>
    </div>
</template>
<script>
    export default {
        mounted() {

        }
    }
</script>
<style scoped>
    ul.list-inline li {
        padding: 0;
        list-style: none;
    }

    .mar-top {
        margin-top: 50px;
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

    .bg-dark {
        background-color: #038ed4 !important;
    }

    #list-menu li a {
        color: #f1f1f1;
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

    #list-link li a {
        color: #038ed4;
        padding: 20px;
        float: left;
        border-bottom: 4px solid rgba(255, 255, 255, 0);
    }

    #list-link li a:hover {
        /* color: #0073BC; */
        /* border-bottom: 4px solid #0073BC; */
        background-color: #038ed4;
        color: #f1f1f1;
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

    /* 
    Our Team
     */
    #team {
        background: #038ed4 !important;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #038ed4;
        border-color: #ffffff;
        box-shadow: none;
        outline: none;
    }

    .btn-primary {
        color: #fff;
        background-color: #038ed4;
        border-color: #038ed4;
    }

    section {
        padding: 60px 0;
    }

    section .section-title {
        text-align: justify;
        color: #ffffff;
        margin-bottom: 50px;
        text-transform: uppercase;
    }

    .card-text {
        text-align: justify;
    }

    #team .card {
        border: solid #038ed4;
        border-radius: 20px;
        background: #ffffff;
    }

    .frontside .card {
        min-height: 312px;
    }

    .frontside .card .card-title {
        color: #038ed4 !important;
        font-variant: small-caps;
        font-size: 25px;
    }

    .card-body {
        padding-bottom: 0px;
    }

    .frontside .card .card-body img {
        width: 120px;
        border-radius: 50%;
    }

    .card-subtitle {
        color: rgb(66, 66, 66);
    }

    .social-icon {
        font-size: 22px;
    }

</style>
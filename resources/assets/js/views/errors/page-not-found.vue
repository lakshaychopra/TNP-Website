<template>
    <div>
        <div class="error-box">
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

            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Oops! There is something wrong!</h3>
                <p class="text-muted m-t-30 m-b-30">The page you have requested is either moved away or doesn't
                    exist.</p>
                <router-link to="/" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</router-link>
            </div>
        </div>
        <footer class="footer" style="left:0">
            <p class="text-center"><small>Developed with <span class="text-danger"><i class="fa fa-heart" aria-hidden="true"></i></span>
                    by <a href="/humans.txt">Genconians</a> | © 2018 <a href="https://www.gndec.ac.in/" target="_blank">GNDEC,
                        Ldh</a></small></p>
        </footer>
    </div>
</template>

<script>
    export default {
        mounted() {}
    }
</script>
<style scoped>
    .list-inline {
        padding-left: 0;
        list-style: none;
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
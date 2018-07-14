<template>
    <div>
         <!-- <div class="sticky-top" style="z-index:1022;">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand d-none d-md-block" href="/">Training &amp; Placement Cell</a>
            <a class="navbar-brand d-md-none" href="/">T&amp;P Cell</a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse" id="collapsibleNavbar">
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

    </div> -->
    <div class="bg-gray">
        <div class="container py-4">
            <div class="row">
                 <div class="col" id="main">
                    
                   <div class="row justify-content-center" id="posts">
                        <div class="col-md-12">

                            <div class="card card-primary">

                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                                <h2>
                                                    <a href="#">{{post.title}}</a>
                                                </h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <div class="post-meta-text col-primary ">{{post.updated_at}}</div>
                                            </div>
                                            <div class="pull-right">
                                                <i class="fa fa-flag" aria-hidden="true"></i> <div class="post-meta-text col-primary ">{{post.category}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                 <div class="card-img-top" data-toggle="modal" v-if="post.image != null" data-target="#exampleModal" :style="getImage(post.image)"
                                    :postImage="post.image"> 
                                 </div>
                                 
                                <div class="card-body">
                                    <div class="mb-3" v-html="post.body"></div>
                                    <div class="clearfix"></div>
                                    <div class="post-share">
                                        <div class="post-meta" style="background-color: #038ed4;">
                                            <i class="fa fa-share-alt" style="color:#fff;" aria-hidden="true"></i> <div style="color:#fff;" class="post-meta-text col-primary ">Share</div>
                                        </div>
                                         <div class="post-meta" style="float:right;">
                                            <i class="fa fa-tags" aria-hidden="true"></i> <div class="post-meta-text col-primary ">{{ post.tag }}</div>
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
// import {showPostURL} from "../../config.js";
export default {
    data() {
            return {
                post:{},
                id:this.$route.params.id
            }
    },
    created(){
        console.log(this.id);
            axios.get('/api/home/view/'+this.id).then((response) => {
            this.post = response.data.data.data[0];
            console.log(this.post);
          })
          .catch((error) => console.log(error))
    },
    methods: {
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
    @media (min-width: 768px){
        .navbar-header{
            width: 142px;
        }
    }
    .w-65{
        width: 65%;
    }
.fix{
    overflow:hidden; 
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
.post-meta-text{
    float: right;
    font-size: 12px;
    padding-top: 3px;
    margin-left: 5px;
}
#sidebar .card-header{
    background-color: #fff;
    border-bottom: 0;
    padding-bottom: 0;
    z-index: 1;
}
#sidebar .card-header h4{
    border-bottom: 2px solid #ecedee;
    margin-bottom: 20px;
    line-height: 28px;
    padding-bottom: 10px;
    position: relative;
}
#sidebar .card-header h4:before{
    content: "";
    position: absolute;
    height: 2px;
    width: 28px;
    background-color: #2f3c4e;
    bottom: -2px;
    left: 0;
}
#sidebar .card-header h4:after{
    content: "\f0b0";
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
#sidebar .card-header i{
    float: left;
    margin-right: 9px;
    padding: 5px 7px;
    background-color: #2f3c4e;
    color: #fff;
    border-radius: 3px;
}
#sidebar .card-body{
    border-bottom: 1px solid #d3d5d7;
    box-shadow: 0 0 5px 0 #e2e3e4;
    padding-top: 0;
}
    #sidebar .card-body:before{
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
    #sidebar .card-body:after{
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
    #posts .post-share{
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
    #posts .card-body:before{
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
    #posts .card-body:after{
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
    .clearfix{
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
    .bg-gray{
        background-color: #f1f1f1;
    }
    .color-main{
        color: #038ed4;
    }
.fix{
    overflow:hidden; 
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
.post-meta-text{
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
    #posts .post-share{
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
    #posts .card-body:before{
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
    #posts .card-body:after{
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
    .clearfix{
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

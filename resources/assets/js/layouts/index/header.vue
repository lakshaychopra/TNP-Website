<template>
    <div>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Navbar</a>
<div class="navbar-header">

  <!-- Toggler/collapsibe Button -->
 
  <!-- Navbar links -->
    <div class="navbar-text d-md-none">
        <ul class="navbar-nav list-inline">
        <li class="nav-item ">
            <a class="nav-link" href="#" @click="search = !search"><i class="fa fa-search"></i></a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>  -->
        </ul>
    </div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>

</div>
    <div class="navbar-collapse collapse" id="collapsibleNavbar">
        <div class="mr-auto d-none d-md-block w-50">
            <!-- <div class="nav navbar-nav navbar-center"> -->
            <!-- <li class="nav-item d-none d-md-block"> -->
                <form class="form-inline" action="/">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </form>
            <!-- </li> -->
        </div>
        <div class="w-50">
            <ul class="nav navbar-nav " id="list-menu">
            <li class="nav-item ml-auto">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
            <!-- <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" @click="search = !search"><i class="fa fa-search"></i></a>
            </li> -->
            </ul>
        </div>
  </div> 
</nav>
<form action="/" method="GET" v-if="search" class="d-sm-none" >
<div class="row bg-col-grey">
    <div class="col-md-11">
            <input id="mr-btm-10" class="form-control mr-sm-2" type="text" placeholder="Search">
    </div>
    <div class="col-md-1">
            <button  class="btn btn-block btn-success" type="submit"><i class="fa fa-search"></i></button>
    </div>
</div>
</form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            search:false
        }   
    }
}
</script>

<style>
.list-inline {
    padding-left: 0;
    list-style: none;
}
.bg-dark{
    background-color: #038ed4 !important;
}
.bg-col-grey{
    background-color: #eee;
    padding: 10px;
}
.btn{
    line-height: 1.5 !important;
}
#mr-btm-10{
    margin-bottom: 10px;
}
#list-menu li a{
    color: #f7fbff;
    padding: 20px;
    float: left;
    border-bottom: 4px solid #0073e7;
}
#list-menu li a:hover{
    color: #f7fbff;
    border-bottom: 4px solid #55ce63;
}
#search{
    background-color: #0073BC;
    border-color: #0073BC;
    width: 88%;
    color: #fff;
}
#search::placeholder{
    color:#fff;
}
.navbar{
    padding: 0 1rem;
}
</style>

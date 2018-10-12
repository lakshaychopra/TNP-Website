<template>
  <div>
    <div class="sticky-top" style="z-index:1022;">
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
    </div>
    <!-- Page Header -->
    <header class="masthead pb-5 pt-5" v-bind:style="{ backgroundImage : 'url(/images/about/images/'+ pageData.image +')' }">
      <!-- <div class="overlay"></div> -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <!-- <h1>{{pageData.title}}</h1>
              <span class="subheading">This is what I do.</span> -->
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container" style="padding-bottom: 90px;">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h1>{{pageData.title}}</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto" v-html="pageData.body">

        </div>
      </div>
    </div>
    <footer class="container-fluid footer" style="left:0; margin-top: 50px;">
      <p class="text-center"><small>Developed with <span class="text-danger"><i class="fa fa-heart" aria-hidden="true"></i>
          </span> by
          <router-link to="/genconian">Genconians</router-link> | © 2018 <a href="https://www.gndec.ac.in/" target="_blank">GNDEC,
            Ldh</a></small></p>
    </footer>
  </div>

</template>
<script>
  export default {
    data() {
      return {
        url: this.$route.params.url,
        pageData: {},
      }
    },
    created() {
      this.fetchData();
    },
    methods: {
      fetchData() {
        // console.log(this.url);
        axios.get('/api/about/view/' + this.url).then((response) => {
            this.pageData = response.data.data.data[0];
            // console.log(response.data.data.data[0]);
          })
          .catch((error) => console.log(error));
        // console.log(this.pageData);
      }
    }
  }
  $("body").on("input propertychange", ".floating-label-form-group", function (e) {
    $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
  }).on("focus", ".floating-label-form-group", function () {
    $(this).addClass("floating-label-form-group-with-focus");
  }).on("blur", ".floating-label-form-group", function () {
    $(this).removeClass("floating-label-form-group-with-focus");
  });

  // Show the navbar when the page is scrolled up
  var MQL = 992;

  //primary navigation slide-in effect
  if ($(window).width() > MQL) {
    var headerHeight = $('#mainNav').height();
    $(window).on('scroll', {
        previousTop: 0
      },
      function () {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < this.previousTop) {
          //if scrolling up...
          if (currentTop > 0 && $('#mainNav').hasClass('is-fixed')) {
            $('#mainNav').addClass('is-visible');
          } else {
            $('#mainNav').removeClass('is-visible is-fixed');
          }
        } else if (currentTop > this.previousTop) {
          //if scrolling down...
          $('#mainNav').removeClass('is-visible');
          if (currentTop > headerHeight && !$('#mainNav').hasClass('is-fixed')) $('#mainNav').addClass('is-fixed');
        }
        this.previousTop = currentTop;
      });
  }
</script>
<style scoped>
  .bg-dark {
    background-color: #038ed4 !important;
  }

  #mainNav {
    position: absolute;
    border-bottom: 1px solid #e9ecef;
    background-color: white;
    /* font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; */
  }

  #mainNav .navbar-brand {
    font-weight: 800;
    color: #343a40;
  }

  #mainNav .navbar-toggler {
    font-size: 12px;
    font-weight: 800;
    padding: 13px;
    text-transform: uppercase;
    color: #343a40;
  }

  #mainNav .navbar-nav>li.nav-item>a {
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
  }

  @media only screen and (min-width: 992px) {
    #mainNav {
      border-bottom: 1px solid transparent;
      background: transparent;
    }

    #mainNav .navbar-brand {
      padding: 10px 20px;
      color: #fff;
    }

    #mainNav .navbar-brand:focus,
    #mainNav .navbar-brand:hover {
      color: rgba(255, 255, 255, 0.8);
    }

    #mainNav .navbar-nav>li.nav-item>a {
      padding: 10px 20px;
      color: #fff;
    }

    #mainNav .navbar-nav>li.nav-item>a:focus,
    #mainNav .navbar-nav>li.nav-item>a:hover {
      color: rgba(255, 255, 255, 0.8);
    }
  }

  @media only screen and (min-width: 992px) {
    #mainNav {
      -webkit-transition: background-color 0.2s;
      transition: background-color 0.2s;
      /* Force Hardware Acceleration in WebKit */
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
      -webkit-backface-visibility: hidden;
    }

    #mainNav.is-fixed {
      /* when the user scrolls down, we hide the header right above the viewport */
      position: fixed;
      top: -67px;
      -webkit-transition: -webkit-transform 0.2s;
      transition: -webkit-transform 0.2s;
      transition: transform 0.2s;
      transition: transform 0.2s, -webkit-transform 0.2s;
      border-bottom: 1px solid white;
      background-color: rgba(255, 255, 255, 0.9);
    }

    #mainNav.is-fixed .navbar-brand {
      color: #212529;
    }

    #mainNav.is-fixed .navbar-brand:focus,
    #mainNav.is-fixed .navbar-brand:hover {
      color: #0085A1;
    }

    #mainNav.is-fixed .navbar-nav>li.nav-item>a {
      color: #212529;
    }

    #mainNav.is-fixed .navbar-nav>li.nav-item>a:focus,
    #mainNav.is-fixed .navbar-nav>li.nav-item>a:hover {
      color: #0085A1;
    }

    #mainNav.is-visible {
      /* if the user changes the scrolling direction, we show the header */
      -webkit-transform: translate3d(0, 100%, 0);
      transform: translate3d(0, 100%, 0);
    }
  }

  header.masthead {
    margin-bottom: 50px;
    background: no-repeat center center;
    background-color: #868e96;
    background-attachment: scroll;
    position: relative;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }

  header.masthead .overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: #212529;
    opacity: 0.5;
  }

  header.masthead .page-heading,
  header.masthead .post-heading,
  header.masthead .site-heading {
    padding: 200px 0 150px;
    color: white;
  }

  @media only screen and (min-width: 768px) {

    header.masthead .page-heading,
    header.masthead .post-heading,
    header.masthead .site-heading {
      padding: 200px 0;
    }
  }

  header.masthead .page-heading,
  header.masthead .site-heading {
    text-align: center;
  }

  header.masthead .page-heading h1,
  header.masthead .site-heading h1 {
    font-size: 50px;
    margin-top: 0;
  }

  header.masthead .page-heading .subheading,
  header.masthead .site-heading .subheading {
    font-size: 24px;
    font-weight: 300;
    line-height: 1.1;
    display: block;
    margin: 10px 0 0;
    /* font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; */
  }

  @media only screen and (min-width: 768px) {

    header.masthead .page-heading h1,
    header.masthead .site-heading h1 {
      font-size: 80px;
    }
  }

  header.masthead .post-heading h1 {
    font-size: 35px;
  }

  header.masthead .post-heading .meta,
  header.masthead .post-heading .subheading {
    line-height: 1.1;
    display: block;
  }

  header.masthead .post-heading .subheading {
    font-size: 24px;
    font-weight: 600;
    margin: 10px 0 30px;
    /* font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; */
  }

  header.masthead .post-heading .meta {
    font-size: 20px;
    font-weight: 300;
    font-style: italic;
    /* font-family: 'Lora', 'Times New Roman', serif; */
  }

  header.masthead .post-heading .meta a {
    color: #fff;
  }

  @media only screen and (min-width: 768px) {
    header.masthead .post-heading h1 {
      font-size: 55px;
    }

    header.masthead .post-heading .subheading {
      font-size: 30px;
    }
  }



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
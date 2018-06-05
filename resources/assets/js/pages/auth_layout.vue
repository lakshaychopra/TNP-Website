<template>
    <div class="app-layout" id= "bg">
        <router-view></router-view>
    </div>
</template>
<style>
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 300px;
  margin: 75px auto;
  padding: 30px;
  text-align: center;
}
.form .thumbnail {
  background: #4797ea;
  width: 150px;
  height: 150px;
  margin: 0 auto 30px;
  padding: 50px 30px;
  border-top-left-radius: 100%;
  border-top-right-radius: 100%;
  border-bottom-left-radius: 100%;
  border-bottom-right-radius: 100%;
  box-sizing: border-box;
}
.form .thumbnail img {
  display: block;
  width: 100%;
}
.form input {
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  outline: 0;
  background: #4797ea;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4797ea;
  text-decoration: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin-top:75px;
  background-color: #4797ea;
  text-align: center;
  padding: 15px 0;
}
.container .info h3 {
  margin: 0 ;
  padding: 0;
  /* font-size: 36px; */
  font-weight: 300;
  color: #fff;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #4797ea;
}
/* END Form */
/* Demo Purposes */
body {
  background: rgba(52, 58, 64, 0.1);
  /* background-image: url('../../img/1.jpg'); */
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;  
}
</style>

<script>
    export default {
      mounted() {
    var random = Math.floor(Math.random() * 3) + 0;
    var bigSize = [
      'url(../images/1.jpg)',
      'url(../images/2.jpg)',
      'url(../images/3.jpg)'
      // 'url(http://placehold.it/300&text=banner2)',
      // 'url(http://placehold.it/300&text=banner3)',
      // 'url(http://placehold.it/300&text=banner4)',
      // 'url(http://placehold.it/300&text=banner5)',
      // 'url(http://placehold.it/300&text=banner6)'
    ];
    document.body.style.backgroundImage= bigSize[random];

    // document.getElementById('bg').style.backgroundImage = 'url(http://placehold.it/300&text=banner6)';
    // console.log(bigSize[random]);
},
    }
</script>

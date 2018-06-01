<template>
    <div class="container">
        <!-- <div class="info">
            <h3>LOGIN</h3>
        </div> -->
        <div class="form">
        <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
        </div>
        <form class="login-form" v-on:submit.prevent="handleLoginFormSubmit()">
            <input type="text" placeholder="Username" v-model="login.username" required/>
            <input type="password" placeholder="Password" v-model="login.password" required/>
            <button>Login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
        </div>
    </div>
</template>
<style>
</style>

<script>
    import { loginURL } from '../config.js';
    export default {
      data(){
        return{
          login:{
            username:'',
            password:''
          }
        }
      },
      methods:{
          handleLoginFormSubmit(){
            const postData = {
                grant_type : 'password',
                client_id :'',
                client_secret :'',
                username:this.login.username,
                password:this.login.password,
                scope:''
            }
            this.$http.post(loginURL,postData).then(Response=>{
              console.log(Response)
            })
          }
      }
    }
</script>

<template>
    <div class="container">
        <!-- <div class="info">
            <h3>LOGIN</h3>
        </div> -->
        <div class="form">
        <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
        </div>
        <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#"><router-link :to="'login'">Sign In</router-link></a></p>
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

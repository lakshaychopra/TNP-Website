<template>
    <div class="container">
        <!-- <div class="info">
            <h3>LOGIN</h3>
        </div> -->
        <div class="form">
        <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
        </div>
        <form class="login-form" action="{{ route('users.post.login') }}">
            <input type="text" placeholder="Username" v-model="login.username" required/>
            <input type="password" placeholder="Password" v-model="login.password" required/>
            <button>Login</button>
            <p class="message">Not registered? <a href="#"><router-link :to="'reg'">Create an account</router-link></a></p>
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
            username:'ABCD',
            password:'123456'
          }
        }
      },
      methods:{
          handleLoginFormSubmit(){
            const postData = {
                usertype : 'EXECUTIVE_MEMBER',
                username:this.login.username,
                password:this.login.password,
            }
            axios.post('/user/login', {
                 username:this.login.username,
                password:this.login.password
            }).then(function (response) {
            console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
            
          }
      }
    }
</script>

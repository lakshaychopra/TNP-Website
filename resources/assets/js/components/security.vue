<template>
    <div class="container">
        <div class="form">
          <h4 class="text-center">Sign in</h4>
        <!-- <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
        </div> -->
        <small>Enter the code recieved in your email.Please check the spam box also.</small>
        <form class="login-form" method="POST"  v-on:submit.prevent="handleLoginFormSubmit">
            <input type="hidden" name="_token" :value="csrf">
            <!-- <input type="text" placeholder="Username" v-model="login.username" name="username" required/>
            <input type="password" placeholder="Password" v-model="login.password" name="password" required/> -->
               <div class="group" :class="{ 'has-error': errors.has('token_2fa'), 'form-group': true } ">
                <input type="password" v-validate data-vv-rules="required"  v-model="login.token_2fa" name="token_2fa" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><i class="fas fa-user"></i><span class="span-input">Enter Code</span></label>
                <span v-if="errors.has('token_2fa')" class="help-block">
                                    <strong>{{ errors.first('token_2fa') }}</strong>
                </span>
                </div>

                <!-- <div class="group" :class="{ 'has-error': errors.has('password'), 'form-group': true } ">
                    <input type="password" v-validate data-vv-rules="required" v-model="login.password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fas fa-key"></i><span class="span-input">Password</span></label>
                    <span v-if="errors.has('password')" class="help-block">
                                        <strong>{{ errors.first('password') }}</strong>
                    </span>
                </div> -->
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="#"><router-link :to="'reg'">Create an account</router-link></a></p>
        </form>
        </div>

    </div>
</template>
<style>

</style>

<script>
import { securityURL } from "../config.js";
import { oauthURL } from "../config.js";
import router from "../routes.js";
// import dashboardVue from './dashboard.vue.js';
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      login: {
        token_2fa: "",
      }
    };
  },
  methods: {
    handleLoginFormSubmit() {
      const postData = {
        // usertype : 'EXECUTIVE_MEMBER',
        token_2fa : this.login.token_2fa,
      };
      axios.post(securityURL, {
          token_2fa: this.login.token_2fa,
        })
        .then(function(response) {
                const data = {
                  client_id:2,
                  client_server:'pDrteuP158hklXiAqRrRraXnxuFGT6WD4kXz1WU4',
                  grant:'password'
                }
                  axios.post(oauthURL,data)
                .then(function(response) {
                  // router.push({name:'dashboard'});
                })
                .catch(function(error) {
                  // console.log(error.response.statusText);
                  Vue.toasted.show(error.response.statusText,{
                        icon : 'exclamation-circle',
                        position: "bottom-center", 
                        duration : 5000
                      })
                });
        })
        .catch(function(error) {
          // console.log(error.response.statusText);
          Vue.toasted.show(error.response.statusText,{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 5000
              })
        });
    }
  }
};
</script>

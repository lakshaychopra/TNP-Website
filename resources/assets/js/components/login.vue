<template>
    <div class="container">
        <div class="form">
          <h4 class="text-center">Sign in</h4>
        <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
        </div>
        <form class="login-form" method="POST"  v-on:submit.prevent="handleLoginFormSubmit">
            <input type="hidden" name="_token" :value="csrf">
            <!-- <input type="text" placeholder="Username" v-model="login.username" name="username" required/>
            <input type="password" placeholder="Password" v-model="login.password" name="password" required/> -->
               <div class="group" :class="{ 'has-error': errors.has('username'), 'form-group': true } ">
                <input type="text" v-validate data-vv-rules="required" v-model="login.username" name="username" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><i class="fas fa-user"></i><span class="span-input">Username</span></label>
                <span v-if="errors.has('username')" class="help-block">
                                    <strong>{{ errors.first('username') }}</strong>
                </span>
                </div>

                <div class="group" :class="{ 'has-error': errors.has('password'), 'form-group': true } ">
                    <input type="password" v-validate data-vv-rules="required" v-model="login.password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fas fa-key"></i><span class="span-input">Password</span></label>
                    <span v-if="errors.has('password')" class="help-block">
                                        <strong>{{ errors.first('password') }}</strong>
                    </span>
                </div>
            <button type="submit">Next</button>
            <p class="message"><a href="#">Forgot password?</a></p>
        </form>
        </div>

    </div>
</template>
<style>

</style>

<script>
import { loginURL } from "../config.js";
import router from "../routes.js";
// import dashboardVue from './dashboard.vue.js';
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      login: {
        username: "",
        password: ""
      }
    };
  },
  methods: {
    handleLoginFormSubmit() {
      const postData = {
        // usertype : 'EXECUTIVE_MEMBER',
        username: this.login.username,
        password: this.login.password
      };
      axios
        .post(loginURL, {
          username: this.login.username,
          password: this.login.password
        })
        .then(function(response) {
          if (response.status == "200") {
            // window.location = "/dashboard";
              router.push({name:'security'});

          }
          // if (response.status == "401") {
          //   }
          console.log(response)

        })
        .catch(function(error) {
          console.log(error.response.request.responseText['@errors']);
          Vue.toasted.show(error.response,{
                icon : 'exclamation-circle',
                position: "bottom-center", 
                duration : 5000
              })
        });
    }
  }
};
</script>

<template>
    <div class="container">
        <div class="form">
        <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
        </div>
        <form class="login-form" method="POST"  v-on:submit.prevent="handleLoginFormSubmit">
            <input type="hidden" name="_token" :value="csrf">
            <!-- <input type="text" placeholder="Username" v-model="login.username" name="username" required/>
            <input type="password" placeholder="Password" v-model="login.password" name="password" required/> -->
                <div class="group">
                <input type="text"  v-model="login.username" name="username" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><i class="fas fa-user"></i><span class="span-input">Username</span></label>
                </div>

                <div class="group">
                    <input type="password" v-model="login.password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><i class="fas fa-key"></i><span class="span-input">Password</span></label>
                </div>
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="#"><router-link :to="'reg'">Create an account</router-link></a></p>
        </form>
        </div>
    </div>
</template>
<style>
</style>

<script>
import { loginURL } from "../config.js";
import router from "../routes.js";
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
          if (response.data == "2") {
            router.push("/dashboard");
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

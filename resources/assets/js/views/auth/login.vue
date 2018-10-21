<template>
    <section id="wrapper">
        <div class="login-register" id="bg" v-if="!authenticated">

            <div class="login-box card container">
                <div class="card-body">

                    <form class="form-horizontal form-material" id="loginform" @submit.prevent="submit">
                        <h3 class="box-title m-b-20">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Sign In
                            <small class="pull-right">
                              <router-link to="/"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</router-link> 
                            </small>
                            </h3>
                            
                        
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label for="Username" hidden>Username</label>
                                <input v-validate="'required'" type="text" name="username" class="form-control" autocomplete="on" placeholder="Username" v-model="loginForm.username">
                                <small class="text-danger">{{ errors.first('username') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="password" hidden>Password</label>
                                <input v-validate="'required|min:6'" type="password" name="password" class="form-control" placeholder="Password" autocomplete="current-password" v-model="loginForm.password">
                                <small class="text-danger">{{ errors.first('password') }}</small>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                    <span v-if="!load">Next
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </span>
                                    <span v-else>
                                        <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                                    </span> 
                                </button>
                            </div>
                        </div>
                        <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="/auth/social/github" class="btn  btn-github" data-toggle="tooltip" title="Login with Github"> <i aria-hidden="true" class="fa fa-github"></i> </a>
                                <a href="/auth/social/twitter" class="btn  btn-twitter" data-toggle="tooltip" title="Login with Twitter"> <i aria-hidden="true" class="fa fa-twitter"></i> </a>
                                <a href="/auth/social/facebook" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                            </div>
                        </div>
                    </div> -->

                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p class="text-info m-l-5">
                                    <router-link :to="{name:'forget'}">
                                        <b>Forgot your password?</b>
                                    </router-link>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <guest-footer></guest-footer>
            </div>
        </div>
        <div class="login-register" id="bg" v-else>
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" @submit.prevent="security_submit">
                        <h3 class="box-title">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Verify it's you
                                <small class="pull-right">
                                    <router-link to="/"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</router-link> 
                                </small>
                            </h3>
                        A mail with 5-digit verification code was just sent to your email.
                        <br>
                        <small>
                            <b class="text-danger">NOTE : </b>Please check the spam box also.</small>
                        <div class="form-group m-t-20 ">
                            <div class="col-xs-12">
                                <label for="password" hidden>Verification Code</label>
                                <input type="password" name="otp" class="form-control" placeholder="Verification Code" autocomplete="off" maxlength="5" pattern="[0-9]*" inputmode="numeric" v-model="security.token_2fa"> 
                                <small class="text-danger">{{ errors.first('otp') }}</small>

                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Login
                                </button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                            </div>
                        </div>
                    </form>
                </div>
                <guest-footer></guest-footer>
            </div>
        </div>
    </section>
</template>

<script>
    import helper from '../../services/helper'
    import {
        loginURL
    } from "../../config.js";
    import {
        securityURL
    } from "../../config.js";
    import GuestFooter from '../../layouts/guest-footer.vue'

    export default {
        data() {
            return {
                authenticated: false,
                token:'',
                loginForm:{
                    username:'',
                    password:''
                },
                security:{
                    token_2fa:'',
                },
                load:false
            }
        },
        components:{
            GuestFooter
        },
        created() {
            if (helper.check()) {
                this.$router.push('/home')
            }
        },
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
            //document.body.style.backgroundImage= bigSize[random];

            document.getElementById('bg').style.backgroundImage = bigSize[random];
            // console.log(bigSize[random]);
        },
        methods: {
            submit(e) {
                this.load=true;
                this.$validator.validateAll().then((result) => {
                    if(result){
                    axios.post(loginURL, this.loginForm).then(response => {
                        if (response.status == "200") {
                            this.token = response.data.data.access_token;
                            axios.defaults.headers.common['Authorization'] = 'Bearer' + this.token;
                            localStorage.setItem('token', this.token);                            
                            if(response.data.data.user.type == "EXECUTIVE_MEMBER"){
                                this.$router.push('/home');
                            }
                            else{
                                this.$router.push('/userlogin');
                            // window.location = "/dashboard";
                            }
                            toastr['success'](response.data.message);
                            // this.authenticated = true;
                            // console.log(this.authenticated);
                            // this.$router.push('/login');
                            // this.$router.push('/home')
                            
                        }
                    }).catch(error => {
                        console.log(error.response);
                        this.load = false;
                        var obj = JSON.parse(error.response.request.responseText);
                        if (error.response.status == "401") {
                            toastr['error'](obj['message']);
                        }

                        if (error.response.status == "422") {
                            if (obj['errors'].hasOwnProperty('username')) {
                                toastr['error'](obj['errors']['username']);
                            }
                            if (obj['errors'].hasOwnProperty('password')) {
                                toastr['error'](obj['errors']['password']);
                            }
                        }
                    });
                    }
                });
            },
            security_submit(e) {
                // this.$validator.validate('otp').then((res) => {
                //     if(res){
                        axios.post(securityURL, this.security).then(response => {
                            console.log(response);
                            localStorage.setItem('token', this.token);
                            toastr['success'](response.data.message);
                            if(response.data.data.type == "EXECUTIVE_MEMBER"){
                                this.$router.push('/home')
                            }
                            else{
                                this.$router.push('/userlogin')
                            }
                        }).catch(error => {
                            console.log(error.response.statusText);
                            toastr['error'](error.response.data.message);
                        });
                    // }
                // console.log(res);
                // });
            }
        }
    }
</script>
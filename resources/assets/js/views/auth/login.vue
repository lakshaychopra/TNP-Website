<template>
    <section id="wrapper">
        <div class="login-register" id="bg" v-if="!authenticated">

            <div class="login-box card container">
                <div class="card-body">

                    <form class="form-horizontal form-material" id="loginform" @submit.prevent="submit">
                        <h3 class="box-title m-b-20">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Sign In</h3>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input type="text" name="email" class="form-control" autocomplete="on" placeholder="Username" v-model="loginForm.username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" v-model="loginForm.password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Next
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
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
                                <p>
                                    <router-link to="/password" class="text-info m-l-5">
                                        <b>Forgot your password?</b>
                                    </router-link>
                                </p>
                                <!-- <p>Don't have an account? <router-link to="/register" class="text-info m-l-5"><b>Sign Up</b></router-link></p> -->
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
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Verify it's you</h3>
                        A mail with 5-digit verification code was just sent to your email.
                        <br>
                        <small>
                            <b class="text-danger">NOTE : </b>Please check the spam box also.</small>
                        <!-- <div class="form-group m-t-20 ">
                        <div class="col-xs-12">
                            <input type="text" name="email" class="form-control" placeholder="Email" v-model="loginForm.email"> </div>
                    </div> -->
                        <div class="form-group m-t-20 ">
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control" placeholder="Verification Code" autocomplete="on" v-model="security.token_2fa"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Login
                                    <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
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
                                <!-- <p>Forgot your password? <router-link to="/password" class="text-info m-l-5"><b>Reset here!</b></router-link></p> -->
                                <!-- <p>Don't have an account? <router-link to="/register" class="text-info m-l-5"><b>Sign Up</b></router-link></p> -->
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
                token: '',
                loginForm: {
                    username: '',
                    password: ''
                },
                security: {
                    token_2fa: '',
                }
            }
        },
        components: {
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
                axios.post(loginURL, this.loginForm).then(response => {
                    if (response.status == "200") {
                        // window.location = "/dashboard";
                        this.token = response.data.data.access_token;
                        axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;

                        toastr['success'](response.data.message);
                        this.authenticated = true;
                        // console.log(this.authenticated);
                        // this.$router.push('/login');
                        // this.$router.push('/home')

                    }
                }).catch(error => {
                    console.log(error.response)
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
            },
            security_submit(e) {
                axios.post(securityURL, this.security).then(response => {
                    console.log(response);
                    localStorage.setItem('token', this.token);
                    toastr['success'](response.data.message);
                    this.$router.push('/home')
                }).catch(error => {
                    console.log(error.response.statusText);
                    toastr['error'](error.response.data.message);
                });
            }
        }
    }
</script>
<template>
    <section id="wrapper">
        <div class="login-register" id="bg">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" @submit.prevent="submit">
                        <h3 class="box-title">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Verify it's you</h3>
                        <small>A mail with 5-digit verification code was just sent to your email.
                            <br>
                            <b class="text-danger">NOTE : </b>Please check the spam box also.</small>
                        <!-- <div class="form-group m-t-20 ">
                        <div class="col-xs-12">
                            <input type="text" name="email" class="form-control" placeholder="Email" v-model="loginForm.email"> </div>
                    </div> -->
                        <div class="form-group m-t-20 ">
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control" placeholder="Verification Code" autocomplete="on" v-model="loginForm.token_2fa"> </div>
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
                <!-- <guest-footer></guest-footer> -->
            </div>
        </div>

    </section>
</template>

<script>
    import helper from '../../services/helper'
    import {
        securityURL
    } from "../../config.js";

    // import GuestFooter from '../../layouts/guest-footer.vue'

    export default {
        data() {
            return {
                loginForm: {
                    token_2fa: '',
                }
            }
        },
        components: {
            // GuestFooter
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
                axios.post(securityURL, this.loginForm).then(response => {
                    console.log(response)
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
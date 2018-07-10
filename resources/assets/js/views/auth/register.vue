<template>
    <section id="wrapper">
        <div class="login-register" id="bg" v-if="!authenticated">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="registerform" @submit.prevent="submit">
                        <h3 class="box-title m-b-20">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Sign Up</h3>
                        <div class="form-group ">
                            <div class="col-xs-6">
                                <label for="University Roll Number" hidden>University Roll No.</label>
                                <input type="text" name="uni_roll_no" class="form-control" placeholder="University Roll No." minlength="7" maxlength="7" autocomplete="on" v-model="registerForm.username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-6">
                                <label for="phone number" hidden>Phone Number</label>
                                <input type="tel" name="ph_no" class="form-control" placeholder="Phone No." autocomplete="tel" maxlength="10" inputmode="numeric" v-model="registerForm.phone_number">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label for="email" hidden>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="email" v-model="registerForm.email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Next 
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p>Already have an account?
                                    <router-link to="/login" class="text-info m-l-5">
                                        <b>Sign In</b>
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
                    <form class="form-horizontal form-material" id="registerform" @submit.prevent="submit_password">
                        <h3 class="box-title m-b-20">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Sign Up</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="password" hidden>Password</label>
                                <input type="password" name="password" minlength="6" class="form-control" autocomplete="new-password" placeholder="Password" v-model="pswdUpdate.password"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="password" hidden>Confirm Password</label>
                                <input type="password" name="password_confirmation" minlength="6" class="form-control" autocomplete="new-password" placeholder="Confirm Password" v-model="password_confirmation"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
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
    import GuestFooter from '../../layouts/guest-footer.vue'
    import {
        registerURL
    } from "../../config.js";
    import {
        setPasswordURL
    } from "../../config.js";

    export default {
        data() {
            return {
                token:'',
                authenticated: false,
                password_confirmation:'',
                registerForm: {
                    username:'',
                    email:'',
                    phone_number:'',
                },
                pswdUpdate: {
                    password:'',
                }
            }
        },
        components: {
            GuestFooter
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
        },
        methods: {
            submit(e) {
                axios.post(registerURL, this.registerForm).then(response => {
                    toastr['success'](response.data.message);
                    this.authenticated = true;
                    this.token = response.data.data.access_token;
                    axios.defaults.headers.common['Authorization'] = 'Bearer' + this.token;
                    // this.$router.push('/login');
                }).catch(error => {
                    toastr['error'](error.response.data.message);
                });
            },

            submit_password(e) {
                axios.post(setPasswordURL, this.pswdUpdate).then(response => {
                    toastr['success'](response.data.message);
                    localStorage.setItem('token', this.token);
                    // this.$router.push('/login');
                }).catch(error => {
                    toastr['error'](error.response.data.message);
                });
            }
        }
    }
</script>
<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Single User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new User</h4>
                        <i  v-if="loading" class="fa fa-spinner fa-spin fa-4x text-center"></i>
                           <form @submit.prevent="storeUser" v-else>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" v-model="user.type">
                                            <option value="STUDENT">Student</option>
                                            <option value="COMPANY">Company</option>
                                            <option value="EXECUTIVE_MEMBER">Executive Member</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input class="form-control" v-model="user.username" name="username"/>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input class="form-control" v-model="user.email" name="email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Phone No.</label>
                                        <input class="form-control" v-model="user.phone_number" name="phone"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input class="form-control" name="password" v-model="user.password" readonly/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
                                <span>Save</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import helper from '../../services/helper'
    import { singleuserURL } from "../../config.js";
    export default {
        data() {
            return {
                loading: false,
                excel_added:false,
                user:{
                    type:'',
                    username:'',
                    email:'',
                    phone_number:'',
                    password: Math.random().toString(36).slice(-8),
                }
            };
        },
        methods: {
             storeUser(){
                this.loading = true;
                axios.post(singleuserURL,this.user)
                    .then(function(response) {
                        toastr['success'](response.message);
                        this.loading = false;
                        console.log(this.loading);
                        console.log(response);
                })
                .catch(response => {
                        this.loading = false;
                        console.log(this.loading);
                        toastr['error'](response.message);
                });
            },
        },
    }
</script>

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
                                        <label for="">Category<span class="input-required text-danger">*</span></label>
                                        <select class="form-control" v-model="user.type" v-validate="'required'" name="category"  >
                                            <option value="STUDENT">Student</option>
                                            <option value="COMPANY">Company</option>
                                            <option value="EXECUTIVE_MEMBER">Executive Member</option>
                                        </select>
                                        <small class="text-danger">{{ errors.first('category') }}</small>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Username<span class="input-required text-danger">*</span></label>
                                        <input class="form-control" v-validate="'required'" v-model="user.username" name="username"/>
                                        <small class="text-danger">{{ errors.first('username') }}</small>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email<span class="input-required text-danger">*</span></label>
                                        <input class="form-control" v-validate="'required|email'" v-model="user.email" name="email"/>
                                        <small class="text-danger">{{ errors.first('email') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Phone No.<span class="input-required text-danger">*</span></label>
                                        <input class="form-control" v-validate="'required|min:10|max:10'" v-model="user.phone_number" name="phone"/>
                                        <small class="text-danger">{{ errors.first('phone') }}</small>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input class="form-control" name="password" v-model="user.password" readonly/>
                                    </div>
                                </div>
                            </div> -->
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
                // loading: false,
                excel_added:false,
                user:{
                    type:'',
                    username:'',
                    email:'',
                    phone_number:'',
                    // password: Math.random().toString(36).slice(-8),
                    password:'',
                }
            };
        },
        methods: {
             storeUser(){
                this.$validator.validateAll().then((result) => {
                        if(result){
                        // this.loading = true;
                        axios.post(singleuserURL,this.user)
                            .then(function(response) {
                                toastr['success'](response.data.message);
                                // this.loading = false;
                                // console.log(this.loading);
                                console.log(response);
                        })
                        .catch(response => {
                                // this.loading = false;
                                // console.log(this.loading);
                                toastr['error'](response.message);
                        });
                    }
                });
            },
        },
    }
</script>

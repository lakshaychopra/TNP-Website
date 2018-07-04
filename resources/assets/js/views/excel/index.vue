<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Excel</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">Excel</li>
                </ol>
            </div>
            <div class="col-md-6 col-8 align-self-right text-right" v-show="excel_added">
                <button class="btn btn-primary" @click="mail">Mail</button>
                <button class="btn btn-primary" @click="download">Download</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Task</h4>
                        <i  v-if="loading" class="fa fa-spinner fa-spin fa-4x text-center"></i>
                           <form @submit.prevent="storeTask" v-else>
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
                                        <label for="">Excel</label>
                                            <input type="file" class="form-control" ref="file" name="file" id="imageUrl" @change="handleChange">
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
    import { downloadExcelURL } from "../../config.js";
    import { mailExcelURL } from "../../config.js";
    import { apiDomain } from "../../config.js";
    export default {
        data() {
            return {
                loading: false,
                excel_added:false,
                user:{
                    'file' : '',
                    'type' : '',
                }
            };
        },
        methods: {
            mail(){
                 axios.get(mailExcelURL)
                    .then(function(response) {
                    console.log(response);
                })
                .catch(error => {
                  console.log(error);
                });
            },
            download(){
                //  axios.get(downloadExcelURL)
                //     .then(function(response) {
                //     console.log(response);
                // })
                // .catch(error => {
                //     console.log(error);
                // });
                 var url = apiDomain + downloadExcelURL;
                 window.open(url, '_blank');
            },
             handleChange(e) {
                this.user.file = e.target.files[0];
                console.log(this.user.file);
             },
             storeTask(){
                this.loading = true;
                let formData = new FormData();
                formData.append('excel', this.user.file);
                formData.append('type', this.user.type);
                axios.post('/api/dashboard/user',formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then(function(response) {
                    toastr['success'](response.message);
                    // this.$emit('completed',response.task)
                    this.loading = false;
                    this.excel_added=true;
                    console.log(this.loading);
                    console.log(response);
                })
                .catch(response => {
                    this.loading = false;
                    this.excel_added=true;
                    console.log(this.loading);
                    toastr['error'](response.message);
                });
            },
        },
    }
</script>

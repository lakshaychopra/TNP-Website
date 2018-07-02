<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Task</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">Task</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Task</h4>
                           <form @submit.prevent="storeTask">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" v-model="user.type">
                                            <option value="STUDENT">Student</option>
                                            <option value="COMPANY">Company</option>
                                            <option value="EXECUTIVE_MEMBER">Executive Member</option>
                                            <option value="MASTER_ADMIN">Master Admin</option>
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

    export default {
        data() {
            return {
                user:{
                    'file' : '',
                    'type' : '',
                }
            };
        },
        methods: {

             handleChange(e) {
                this.user.file = e.target.files[0];
                console.log(this.user.file);
             },
             storeTask(){
                let formData = new FormData();
                formData.append('excel', this.user.file);
                formData.append('type', this.user.type);
                axios.post('/api/dashboard/user',formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then(function(response) {
                    toastr['success'](response.message);
                    this.$emit('completed',response.task)
                    console.log(response);
                })
                .catch(response => {
                    toastr['error'](response.message);
                });
            },
        },
    }
</script>

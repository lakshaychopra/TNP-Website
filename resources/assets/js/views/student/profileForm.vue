<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item"><router-link to="/task">Post</router-link></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol> -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Profile Details</h2>
                        
                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post"  @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" required="required" placeholder="Gender" class="form-control">
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Category" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Height" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Weight" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Blood Group" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                
                
                            <h2 class="card-title mt-3 text-primary">Acadaemic Details</h2>
                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Class Roll No." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Hosteller / Day Scholar" class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Batch" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Branch" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Stream" class="form-control">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Section" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Shift" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Training Sem" class="form-control">
                                    </div>
                                </div>
                            </div>

                             <h2 class="card-title mt-3 text-primary">Parent Details</h2>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Father's Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Father's Phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Mother's Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Mother's Phone" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <h2 class="card-title mt-3 text-primary">Address Details</h2>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="City" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="District" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="State" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" required="required" placeholder="Pincode" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-info pull-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>
<script>
import { firstLoginURL } from "../../config.js";
import { statusChangeURL } from "../../config.js";
import { storeStudentURL } from "../../config.js";
export default {
    data(){
        return{
            id:{
                'id':this.$store.state.auth.userid,
            },
            tnc:{
                'form_status':'pending',
                'id':this.$store.state.auth.userid,
            },
            username:{
                'univ_roll_no':this.$store.state.auth.username,
            },
        }
    },
    methods:{
         getAuthUser(name){
                return this.$store.getters.getAuthUser(name);
        },
        submit(){
            console.log(this.tnc.id);
            axios.post(firstLoginURL,this.id).then(response => {
                console.log(response);
                if (response.status == 200) {
                    axios.post(statusChangeURL,this.tnc).then(res => {
                        console.log(res);
                        if (res.status == 200) {    
                            axios.post(storeStudentURL,this.username).then(resp => {
                                console.log(res);
                                if (resp.status == 200) {
                                    toastr['success']("User Added!!");
                                    this.$router.push('/userlogin');
                                }
                            }).catch(erro => {
                            console.log(erro);
                            });
                        }
                    }).catch(err => {
                       console.log(err);
                    });
                }
            }).catch(error => {
                       console.log(error);
            });
        }
    }
}
</script>
<style scoped>
.text-primary{
    color: #0185c2 !important;
}
body{
    font-family: 'Open Sans';
}
</style>

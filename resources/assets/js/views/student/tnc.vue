<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <!-- <h3 class="text-themecolor m-b-0 m-t-0">Terms and Conditions</h3> -->
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item"><router-link to="/task">Post</router-link></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol> -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Terms and Conditions</h4>
                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post"  @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" name="terms" required="required"> I Agree to the terms and conditions given above 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Submit">
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
import { formstepChangeURL } from "../../config.js";
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
                'aadhaar_no':this.$store.state.auth.username,
            },
            form_step:{
                'student_form_step':'TC',
                'id':this.$store.state.auth.userid,
            }
        }
    },
    methods:{
         getAuthUser(name){
                return this.$store.getters.getAuthUser(name);
        },
        submit(){
            console.log(this.username.aadhaar_no);
            axios.post(firstLoginURL,this.id).then(response => {
                console.log(response);
                if (response.status == 200) {
                    axios.post(statusChangeURL,this.tnc).then(res => {
                        console.log(res);
                        if (res.status == 200) {    
                            axios.post(formstepChangeURL,this.form_step).then(stat => {
                                console.log(stat);
                                if (stat.status == 200) {
                                        console.log(stat);
                                        axios.post(storeStudentURL,this.username).then(resp => {
                                        if (resp.status == 200) {
                                            toastr['success']("User Added!!");
                                            // this.$router.push('/userlogin');
                                            this.$parent.step = 2;

                                        }
                                    }).catch(er => {
                                    console.log(er);
                                    });
                                    // toastr['success']("User Added!!");
                                    // this.$router.push('/userlogin');
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

</style>

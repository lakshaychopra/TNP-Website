<template>
    <div>
        <div class="row page-titles">
            <div class="col-xs-6 col-8 align-self-center">
                <!-- <h3 class="text-themecolor m-b-0 m-t-0">Terms and Conditions</h3> -->
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item"><router-link to="/task">Post</router-link></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol> -->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Terms and Conditions</h5>
                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-xs-12 col-md-11 mx-auto">
                                    <ol>
                                        <li style="text-align: justify;">Students must fill all the details accurately.</li>
                                        <li style="text-align: justify;">The credentials that you mention should match
                                            with your original documents.</li>
                                        <li style="text-align: justify;">No redundancy should be there in the
                                            information provided.</li>
                                        <li style="text-align: justify;">Students should make sure that their Email
                                            id&rsquo;s and Mobile numbers are filled accurately.</li>
                                        <li style="text-align: justify;">Students should check the gazettes properly
                                            before filling the semester details.</li>
                                        <li style="text-align: justify;">Students must mention their height in
                                            centimetres and weight in kgs.</li>
                                        <li style="text-align: justify;">The format for Date of birth should be
                                            (dd/mm/yyyy).</li>
                                        <li style="text-align: justify;">Initials of name must be in Upper-case.</li>
                                        <li style="text-align: justify;">The validity of category certificates should
                                            be checked before filling.</li>
                                        <li style="text-align: justify;">The year gap should be mentioned properly. For
                                            eg. If you have dropped one year after your 12th or Diploma then the year
                                            gap is &lsquo;1&rsquo;.</li>
                                        <li style="text-align: justify;">Students should fill their Active and Passive
                                            backlogs accurately.</li>
                                        <li style="text-align: justify;">Active backlogs are the pending backlogs that
                                            are yet to be cleared and the Passive backlogs are the one that has been
                                            cleared.</li>
                                        <li style="text-align: justify;">For Active Backlogs put SGPA as 0.</li>
                                        <li style="text-align: justify;">Students must fill their 10th CGPA or
                                            Percentage depending upon their examination boards.</li>
                                        <li style="text-align: justify;">Don&rsquo;t forge the documents else strict
                                            action will be taken against you.</li>
                                    </ol>
                            <br>

                                    <div class="col-xs-12 col-lg-8 mx-auto form-group">
                                        <input type="checkbox" class="form-check-input" name="terms" required="required">
                                        <strong> I Agree to the
                                            terms and
                                            conditions given above
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8 mx-auto text-center form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="I Agree">
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
    import {
        firstLoginURL
    } from "../../config.js";
    import {
        statusChangeURL
    } from "../../config.js";
    import {
        storeStudentURL
    } from "../../config.js";
    import {
        formstepChangeURL
    } from "../../config.js";
    export default {
        data() {
            return {
                id: {
                    'id': this.$store.state.auth.userid,
                },
                tnc: {
                    'form_status': 'pending',
                    'id': this.$store.state.auth.userid,
                },
                username: {
                    'univ_roll_no': this.$store.state.auth.username,
                },
                form_step: {
                    'student_form_step': 'TC',
                    'id': this.$store.state.auth.userid,
                }
            }
        },
        methods: {
            getAuthUser(name) {
                return this.$store.getters.getAuthUser(name);
            },
            submit() {
                console.log(this.username.univ_roll_no);
                axios.post(firstLoginURL, this.id).then(response => {
                    console.log(response);
                    if (response.status == 200) {
                        axios.post(statusChangeURL, this.tnc).then(res => {
                            console.log(res);
                            if (res.status == 200) {
                                axios.post(formstepChangeURL, this.form_step).then(stat => {
                                    console.log(stat);
                                    if (stat.status == 200) {
                                        console.log(stat);
                                        axios.post(storeStudentURL, this.username).then(resp => {
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
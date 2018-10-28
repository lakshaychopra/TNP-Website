<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Profile Details</h2>

                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="md-radio-inlinename" v-model="student.name"
                                            placeholder="Name" class="form-control">
                                        <small class="form-text text-primary text-uppercase">Name</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-2 col-form-label">Gender : </label>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="gender" v-model="student.gender" id="male" value="MALE">
                                            <label for="male">Male</label>
                                        </div>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="gender" v-model="student.gender" id="female"
                                                value="FEMALE">
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="category" v-model="student.category" class="form-control">
                                            <option disabled selected value="null">Category</option>
                                            <option value="GEN">General</option>
                                            <option value="SC">SC</option>
                                            <option value="ST">ST</option>
                                            <option value="OBC">OBC</option>
                                        </select>
                                        <small class="form-text text-primary text-uppercase">Category</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="height" v-model="student.height" placeholder="Height"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Height</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="weight" v-model="student.weight" placeholder="Weight"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Weight</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="blood_group" v-model="student.blood_group" class="form-control">
                                            <small class="form-text text-primary text-uppercase">Weight</small>
                                            <option disabled value="null">Blood Group</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                        </select>
                                        <small class="form-text text-primary text-uppercase">Blood Group</small>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-title mt-3 text-primary">Academic Details</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="uniRoll" v-model="student.univ_roll_no"
                                            placeholder="University Roll No." class="form-control">
                                        <small class="form-text text-primary text-uppercase">University Roll No.</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="classRoll" v-model="student.class_roll_no"
                                            placeholder="Class Roll No." class="form-control">
                                        <small class="form-text text-primary text-uppercase">Class Roll No.</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="living" v-model="student.living" class="form-control">
                                            <option disabled value="null">Hosteler / Day Scholar</option>
                                            <option value="HOSTELER">Hosteler</option>
                                            <option value="DAYSCHOLAR">Day Scholar</option>
                                        </select>
                                        <small class="form-text text-primary text-uppercase">Hosteler / Day Scholar</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="batch" v-model="student.batch" placeholder="Batch"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Batch</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="branch" v-model="student.branch_type" class="form-control">
                                            <option disabled value="null">Branch</option>
                                            <option value="B.Tech.">B.Tech</option>
                                            <option value="M.Tech.">M.Tech</option>
                                            <option value="M.B.A.">M.B.A.</option>
                                            <option value="M.C.A.">M.C.A.</option>
                                        </select>
                                        <small class="form-text text-primary text-uppercase">Branch</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="stream" v-model="student.stream" class="form-control">
                                            <option disabled value="null">Stream</option>
                                            <option value="Civil">Civil Engineering</option>
                                            <option value="Computer">Computer Science and Engineering</option>
                                            <option value="Electrical">Electrical Engineering</option>
                                            <option value="Electronics">Electronics and Communication Engineering
                                            </option>
                                            <option value="Information">Information Technology</option>
                                            <option value="Mechenical">Mechenical Engineering</option>
                                            <option value="Production">Production Engineering</option>
                                        </select>
                                        <small class="form-text text-primary text-uppercase">Stream</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="section" v-model="student.section" placeholder="Section"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Section</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="shift" v-model="student.shift" class="form-control">
                                            <option value="null" disabled>Shift</option>
                                            <option value="MORNING">Morning</option>
                                            <option value="EVENING">Evening</option>
                                        </select>
                                        <small class="form-text text-primary text-uppercase">Shift</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 col-form-label">Training Semester : </label>
                                        <div class="col-md-1 md-radio md-radio-inline">
                                            <input type="radio" name="t_sem" id="7" v-model="student.training_semester"
                                                value="7">
                                            <label for="7">7</label>
                                        </div>
                                        <div class="col-md-1 md-radio md-radio-inline">
                                            <input type="radio" name="t_sem" id="8" v-model="student.training_semester"
                                                value="8">
                                            <label for="8">8</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-title mt-3 text-primary">Parent Details</h2>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" v-model="student.father_name" placeholder="Father's Name"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Father's Name</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fphone" v-model="student.father_phone" placeholder="Father's Phone"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Father's Phone Number</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mname" v-model="student.mother_name" placeholder="Mother's Name"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Mother's Name</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mphone" v-model="student.mother_phone" placeholder="Mother's Phone"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Mother's Phone Number</small>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-title mt-3 text-primary">Address Details</h2>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="address" v-model="student.address" placeholder="Address"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Address</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="city" v-model="student.city" placeholder="City" class="form-control">
                                        <small class="form-text text-primary text-uppercase">City</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="district" v-model="student.district" placeholder="District"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">District</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="state" v-model="student.state" placeholder="State"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">State</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" min="0" name="pincode" v-model="student.pincode" placeholder="Pincode"
                                            class="form-control">
                                        <small class="form-text text-primary text-uppercase">Pincode</small>
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
    import {
        storeStudentURL,
        formstepChangeURL
    } from "../../config.js";
    import {
        fetchProfileURL
    } from "../../config.js";
    export default {
        data() {
            return {
                userid: this.$store.state.auth.userid,
                student: {},

                profile: {
                    'univ_roll_no': this.$store.state.auth.username,
                    // 'id': this.$store.state.auth.userid,
                },
                statusChange: {
                    'student_form_step': 'PROFILE',
                    'id': this.$parent.id,
                },
            }
        },
        beforeCreate() {
            axios.get('/api/dashboard/student/' + this.$parent.username + '/edit').then(response => {
                console.log(response.data.data[0]);
                // if (response.status == 200) {

                // }
                this.student = response.data.data[0];
            }).catch(error => {
                console.log(error);
            });
            // console.log(this.id.student);
        },
        methods: {

            getAuthUser(name) {
                return this.$store.getters.getAuthUser(name);
            },
            submit() {
                let formData = new FormData();
                formData.append('name', this.student.name);
                formData.append('gender', this.student.gender);
                formData.append('category', this.student.category);
                formData.append('height', this.student.height);
                formData.append('weight', this.student.weight);
                formData.append('blood_group', this.student.blood_group);
                formData.append('univ_roll_no', this.student.univ_roll_no);
                formData.append('class_roll_no', this.student.class_roll_no);
                formData.append('living', this.student.living);
                formData.append('batch', this.student.batch);
                formData.append('branch_type', this.student.branch_type);
                formData.append('stream', this.student.stream);
                formData.append('section', this.student.section);
                formData.append('shift', this.student.shift);
                formData.append('training_semester', this.student.training_semester);
                formData.append('father_name', this.student.father_name);
                formData.append('father_phone', this.student.father_phone);
                formData.append('mother_name', this.student.mother_name);
                formData.append('mother_phone', this.student.mother_phone);
                formData.append('address', this.student.address);
                formData.append('city', this.student.city);
                formData.append('district', this.student.district);
                formData.append('state', this.student.state);
                formData.append('pincode', this.student.pincode);
                formData.append('_method', 'PUT');
                // console.log(this.id.id);
                console.log(this.student.name + ' ' + this.student.gender + ' ' + this.student.category + ' ' + this.student
                    .height + ' ' + this.student.weight + ' ' + this.student.blood_group + ' ' + this.student.univ_roll_no +
                    ' ' + this.student.class_roll_no + ' ' + this.student.living + ' ' + this.student.batch + ' ' +
                    this.student.branch_type + ' ' + this.student.stream + ' ' + this.student.section + ' ' + this.student
                    .shift + ' ' + this.student.training_semester + ' ' + this.student.father_name + ' ' + this.student
                    .father_phone + ' ' + this.student.mother_name + ' ' + this.student.mother_phone + ' ' + this.student
                    .address + ' ' + this.student.city + ' ' + this.student.district + ' ' + this.student.state +
                    ' ' + this.student.pincode);
                // console.log('1');
                axios.post(storeStudentURL + this.student.id, formData).then(response => {
                    axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {
                        if (statusresponse.status == 200) {
                            // toastr['success']("User Added!!");
                            this.$parent.step = 3;
                            // this.$router.push('/req');

                        }
                    }).catch(errors => {
                        console.log(errors);
                    });
                    console.log(response);
                    // if (response.status == 200) {

                    // }
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>
<style scoped>
    .text-primary {
        color: #0185c2 !important;
    }

    .col-form-label {
        padding-left: 0;
    }
</style>
<style lang="scss" scoped>
    $md-radio-checked-color: rgb(51, 122, 183);
    $md-radio-border-color: rgba(0, 0, 0, 0.54);
    $md-radio-size: 20px;
    $md-radio-checked-size: 10px;
    $md-radio-ripple-size: 15px;

    @keyframes ripple {
        0% {
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.0);
        }

        50% {
            box-shadow: 0px 0px 0px $md-radio-ripple-size rgba(0, 0, 0, 0.1);
        }

        100% {
            box-shadow: 0px 0px 0px $md-radio-ripple-size rgba(0, 0, 0, 0);
        }
    }

    .md-radio {
        margin: 16px 0;

        &.md-radio-inline {
            display: inline-block;
        }

        input[type="radio"] {
            display: none;

            &:checked+label:before {
                border-color: $md-radio-checked-color;
                animation: ripple 0.2s linear forwards;
            }

            &:checked+label:after {
                transform: scale(1);
            }
        }

        label {
            display: inline-block;
            height: $md-radio-size;
            position: relative;
            padding: 0 ($md-radio-size + 10px);
            margin-bottom: 0;
            cursor: pointer;
            vertical-align: bottom;

            &:before,
            &:after {
                position: absolute;
                content: '';
                border-radius: 50%;
                transition: all .3s ease;
                transition-property: transform, border-color;
            }

            &:before {
                left: 0;
                top: 0;
                width: $md-radio-size;
                height: $md-radio-size;
                border: 2px solid $md-radio-border-color;
            }

            &:after {
                top: $md-radio-size / 2 - $md-radio-checked-size / 2;
                left: $md-radio-size / 2 - $md-radio-checked-size / 2;
                width: $md-radio-checked-size;
                height: $md-radio-checked-size;
                transform: scale(0);
                background: $md-radio-checked-color;
            }
        }
    }
</style>
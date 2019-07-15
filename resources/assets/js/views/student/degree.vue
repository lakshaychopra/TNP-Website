<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Degree Details</h2>

                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="validateForm">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="number" name="semester" v-model="student.semester_status"
                                            placeholder="Semester" class="form-control" disabled>
                                        <small class="form-text text-primary text-uppercase">Semester</small>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="Marks Type" class="col-md-3 col-form-label">Marks Type : </label>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="marks_type" id="CGPA" v-model="student.marks_type"
                                                value="CGPA" v-on:change="resetmarks()">
                                            <label for="CGPA">SGPA</label>
                                        </div>
                                        <!-- <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="marks_type" id="PERCENTAGE" v-model="student.marks_type"
                                                value="PERCENTAGE" v-on:change="resetmarks()">
                                            <label for="PERCENTAGE">PERCENTAGE</label>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input  v-validate="'required'" type="number" name="obtained" min="0" max="10" step="0.01" v-model="update_marks.obtained_marks"
                                            placeholder="Obtained SGPA" class="form-control" v-on:input="percentCalculate()"
                                            v-if="this.student.marks_type=='CGPA'">
                                        <input type="text" name="obtained" v-model="update_marks.obtained_marks"
                                            placeholder="Obtained SGPA" class="form-control" v-on:input="percentCalculate()"
                                            v-else>
                                        <small class="form-text text-primary text-uppercase">Obtained SGPA
                                            <span class="text-danger pull-right">{{errors.first('obtained SGPA')}}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input  v-validate="'required'" type="number" name="max" min="10" max="10" v-model="update_marks.max_marks" class="form-control"
                                            placeholder="0" value="10" v-if="this.student.marks_type=='CGPA'">
                                        <input type="text" name="max" v-model="update_marks.max_marks" placeholder="Max SGPA"
                                            class="form-control" v-on:input="percentCalculate()" v-else>
                                        <span class="small text-primary text-uppercase">Max SGPA</span>
                                        <span id="percent" class="small text-muted pull-right">Percent = {{update_marks.percent }}% </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input  v-validate="'required'"  type="number" step="1" min="0" value="0" name="credits" v-model="update_marks.credits"
                                            class="form-control" placeholder="Credits">
                                        <small class="form-text text-primary text-uppercase">Credits
                                            <span class="text-danger pull-right">{{errors.first('credits')}}</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input   v-validate="'required'" type="number" name="active_backlog" v-model="update_marks.active_backlog"
                                            class="form-control" step="1" min="0" value="0" placeholder="Active Backlog">
                                        <small class="form-text text-primary text-uppercase">Active Backlog
                                            <span class="text-danger pull-right">{{errors.first('active backlog')}}</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input  v-validate="'required'" type="number" name="passive_backlog" step="1" min="0" value="0" v-model="update_marks.passive_backlog"
                                            class="form-control" placeholder="Passive Backlog">
                                        <small class="form-text text-primary text-uppercase">Passive Backlog
                                            <span class="text-danger pull-right">{{errors.first('passive backlog')}}</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" value="I Agree" class="btn btn-info btn-lg pull-right" >
                                        Submit
                                        <!-- <span v-if="!load">Submit
                                        </span> 
                                        <span v-else>
                                         <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                                        </span>  -->
                                        </button>
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
        storeStudentDegreeURL,
        formstepChangeURL,
        fetchProfileURL
    } from "../../config.js";
    export default {
        data() {
            return {
                student: {},
                update_marks: {
                    obtained_marks: 0,
                    max_marks: 0,
                    credits: 0,
                    active_backlog: 0,
                    passive_backlog: 0,
                    percent: 0,
                },
                marks_type:"CGPA",
                id: this.$parent.id,
                monthYear: '',
                month: '',
                year: '',
                profile: {
                    'univ_roll_no': this.$parent.username,
                },
                statusChange: {
                    'student_form_step': 'PREVIOUS_EDUCATION',
                    'id': this.$parent.id,
                },
                statusChange1: {
                    'student_form_step': 'DEGREE',
                    'id': this.$parent.id,
                },
                load:false
            }
        },
        created() {

            axios.get('/api/dashboard/student/sem/' + this.$parent.username + '/edit').then(response => {
                console.log(response.data.data[0]);
                console.log('sem_limit');
                console.log('hello '+this.$parent.sem_limit);
                this.student = response.data.data[0];
                
                this.update_marks.obtained_marks = this.splitarray(this.student.obtained_marks, this.student.semester_status);
                this.update_marks.max_marks = this.splitarray(this.student.max_marks, this.student.semester_status);
                this.update_marks.credits = this.splitarray(this.student.credits, this.student.semester_status);
                this.update_marks.active_backlog = this.splitarray(this.student.active_backlog, this.student.semester_status);
                this.update_marks.passive_backlog = this.splitarray(this.student.passive_backlog, this.student.semester_status);
                this.update_marks.percent = this.splitarray(this.student.percentage, this.student.semester_status);
            }).catch(error => {
                console.log(error);
            });
            // console.log(this.id.student);
        },
        methods: {
            splitarray(arr, index) {
                return arr.split('-')[index - 1];
            },
            changeValue(old, newVal, index) {
                var arr = old.split('-');
                arr.splice(index - 1, 1, newVal);
                return arr.join('-');
            },
            resetmarks() {
                this.percent = 0;
                this.update_marks.obtained_marks = undefined;
                this.update_marks.credits = undefined;
                this.update_marks.passive_backlog = undefined;
                this.update_marks.active_backlog = undefined;
                if (this.student.marks_type == 'CGPA') {
                    this.update_marks.max_marks = 10;
                } else {
                    this.update_marks.max_marks = undefined;
                }
            },
            validateForm() {
               this.$validator.validateAll().then((result) => {
               if (result) {
                 this.submit();
               }
               else{
                 alert('Please enter missing details.');
               }
             });
          },

            percentCalculate() {
                if (this.student.marks_type == 'CGPA') {
                    // console.log(this.student.max_marks);
                    if (this.update_marks.obtained_marks != undefined && (this.update_marks.max_marks != undefined ||
                            this.update_marks
                            .max_marks != '')) {
                        this.update_marks.percent = this.update_marks.obtained_marks * 9.5;
                    } else {
                        this.update_marks.percent = 0;
                    }
                } else {
                    if (this.update_marks.obtained_marks != undefined && this.update_marks.max_marks != undefined) {
                        this.update_marks.percent = (this.update_marks.obtained_marks / this.update_marks.max_marks) *
                            100;
                    } else {
                        this.update_marks.percent = 0;
                    }

                }
            },
            getAuthUser(name) {
                return this.$store.getters.getAuthUser(name);
            },
             submit() {
                 this.load=true;
                this.student.obtained_marks = this.changeValue(this.student.obtained_marks, this.update_marks.obtained_marks,
                    this.student.semester_status);
                this.student.max_marks = this.changeValue(this.student.max_marks, this.update_marks.max_marks, this.student
                    .semester_status);
                this.student.credits = this.changeValue(this.student.credits, this.update_marks.credits, this.student.semester_status);
                this.student.active_backlog = this.changeValue(this.student.active_backlog, this.update_marks.active_backlog,
                    this.student.semester_status);
                this.student.passive_backlog = this.changeValue(this.student.passive_backlog, this.update_marks.passive_backlog,
                    this.student.semester_status);
                this.student.percentage = this.changeValue(this.student.percentage, this.update_marks.percent, this.student
                    .semester_status);
                    
                if(this.student.semester_status<this.$parent.sem_limit){
                    this.student.semester_status = parseInt(this.student.semester_status) + 1;
                    axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {  
                            console.log(statusresponse+' testing');
                             }).catch(errors => {
                            console.log(errors);
                            });

                }
                else{
                    axios.post(formstepChangeURL, this.statusChange1).then(statusresponse => { 
                            console.log(statusresponse);
                             this.$parent.step = 6;
                             }).catch(errors => {
                            console.log(errors);
                            });
                }
                let formData = new FormData();
                formData.append('univ_roll_no', this.student.univ_roll_no);
                formData.append('semester', this.student.semester);
                formData.append('obtained_marks', this.student.obtained_marks);
                formData.append('max_marks', this.student.max_marks);
                formData.append('credits', this.student.credits);
                formData.append('active_backlog', this.student.active_backlog);
                formData.append('passive_backlog', this.student.passive_backlog);
                formData.append('marks_type', this.student.marks_type);
                formData.append('percentage', this.student.percentage);
                formData.append('semester_status', this.student.semester_status);
                console.log(this.student);
                formData.append('_method', 'PUT');
                axios.post(storeStudentDegreeURL + this.student.id, formData).then(response => {     
                     console.log(this.student.semester_status);
                });
                this.resetmarks();
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
<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Aggregate</h2>

                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Marks Type" class="col-md-2 col-form-label">Marks Type : </label>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="marks_type" id="CGPA" v-model="student.marks_type"
                                                value="CGPA" v-on:change="resetmarks()">
                                            <label for="CGPA">CGPA</label>
                                        </div>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="marks_type" id="PERCENTAGE" v-model="student.marks_type"
                                                value="PERCENTAGE" v-on:change="resetmarks()">
                                            <label for="PERCENTAGE">PERCENTAGE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="obtained" v-model="aggregate.obtained_marks"
                                            placeholder="Obtained Marks" class="form-control" v-on:input="percentCalculate()"
                                            >
                                        
                                        <small class="form-text text-primary text-uppercase">Obtained Marks</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="max" v-model="aggregate.max_marks" class="form-control"
                                            placeholder="10" value="10">
                                        <span class="small text-primary text-uppercase">Max Marks</span>
                                        <span id="percent" class="small text-muted pull-right">Percent = {{aggregate.percentage }}% </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" step="1" min="0" value="0" name="credits" v-model="aggregate.credits"
                                            class="form-control" placeholder="Credits">
                                        <small class="form-text text-primary text-uppercase">Credits</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="active_backlog" v-model="aggregate.active_backlog"
                                            class="form-control" step="1" min="0" value="0" placeholder="Active Backlog">
                                        <small class="form-text text-primary text-uppercase">Active Backlog</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="passive_backlog" step="1" min="0" value="0" v-model="aggregate.passive_backlog"
                                            class="form-control" placeholder="Passive Backlog">
                                        <small class="form-text text-primary text-uppercase">Passive Backlog</small>
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
        storeStudentAggregateURL,
        formstepChangeURL,
        fetchProfileURL,
        storeStudentDegreeURL
    } from "../../config.js";
    export default {
        data() {
            return {
                student: {},
                aggregate:{},    

                update_marks: {
                    obtained_marks: 0,
                    max_marks: 0,
                    credits: 0,
                    active_backlog: 0,
                    passive_backlog: 0,
                    percent: 0,
                },
                id: this.$parent.id,
                monthYear: '',
                month: '',
                year: '',
                profile: {
                    'univ_roll_no': this.$parent.username,
                },
                statusChange: {
                    'student_form_step': 'SUBMITTED',
                    'id': this.$parent.id,
                },
            }
        },
        created() {
            axios.get( storeStudentDegreeURL + this.$parent.username + '/edit').then(response => {
                console.log(response.data.data[0]);
                this.student = response.data.data[0];
                this.update_marks.obtained_marks = this.student.obtained_marks.split('-');
                this.update_marks.max_marks = this.student.max_marks.split('-');
                this.update_marks.active_backlog = this.student.active_backlog.split('-');
                this.update_marks.passive_backlog = this.student.passive_backlog.split('-');
                this.update_marks.credits = this.student.credits.split('-');

                var i , sum=0, product=0, sum_credits = 0, sum_active = 0, sum_passive=0, sum_max = 0;
                
                if(this.student.marks_type == 'CGPA'){
                    console.log(this.update_marks.obtained_marks.length);
                    for(i =0;i<this.update_marks.obtained_marks.length;i++){
                        product = parseInt(this.update_marks.obtained_marks[i]) * parseInt(this.update_marks.credits);
                        console.log(product);
                        sum = sum + product;   
                        sum_max = sum_max + parseInt(this.update_marks.max_marks[i]);                         
                        sum_active = sum_active + parseInt(this.update_marks.active_backlog[i]);
                        sum_passive = sum_passive + parseInt(this.update_marks.passive_backlog[i]);
                        sum_credits = sum_credits + parseInt(this.update_marks.credits);
                    }
                    // console.log(sum);
                        this.aggregate.obtained_marks = sum;
                        this.aggregate.credits = sum_credits;
                        this.aggregate.percentage = (sum / sum_credits ) * 9.5 ;
                        this.aggregate.active_backlog = sum_active;
                        this.aggregate.passive_backlog = sum_passive;
                        this.aggregate.max_marks = sum_max;
                    }
                else{
                     for(i =0;i<this.update_marks.obtained_marks.length;i++){
                        //  product = parseInt(this.update_marks.obtained_marks[i]) * parseInt(this.update_marks.credits);
                        sum = sum + parseInt(this.update_marks.obtained_marks[i]); 
                        sum_max = sum_max + parseInt(this.update_marks.max_marks[i]);
                        sum_credits = sum_credits + parseInt(this.update_marks.credits[i]);
                        sum_active = sum_active + parseInt(this.update_marks.active_backlog[i]);
                        sum_passive = sum_passive + parseInt(this.update_marks.passive_backlog[i]);
                    }   
                        this.aggregate.obtained_marks = sum;
                        this.aggregate.credits = sum_credits;
                        this.aggregate.percentage = (sum / sum_max)  * 100 ;
                        this.aggregate.active_backlog = sum_active;
                        this.aggregate.passive_backlog = sum_passive;
                        this.aggregate.max_marks = sum_max;


                }                
            }).catch(error => {
                console.log(error);
            });
            
            axios.get('/api/dashboard/student/aggregate/' + this.$parent.username + '/edit').then(response => {
                console.log(response.data.data[0]);
                // this.student = response.data.data[0];

                // this.update_marks.obtained_marks = this.splitarray(this.student.obtained_marks, this.student.semester_status);
                // this.update_marks.max_marks = this.splitarray(this.student.max_marks, this.student.semester_status);
                // this.update_marks.credits = this.splitarray(this.student.credits, this.student.semester_status);
                // this.update_marks.active_backlog = this.splitarray(this.student.active_backlog, this.student.semester_status);
                // this.update_marks.passive_backlog = this.splitarray(this.student.passive_backlog, this.student.semester_status);
                // this.update_marks.percent = this.splitarray(this.student.percentage, this.student.semester_status);
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
                formData.append('univ_roll_no', this.student.univ_roll_no);
                formData.append('semester', this.student.semester);
                formData.append('obtained_marks', this.aggregate.obtained_marks);
                formData.append('max_marks', this.aggregate.max_marks);
                formData.append('credits', this.aggregate.credits);
                formData.append('active_backlog', this.aggregate.active_backlog);
                formData.append('passive_backlog', this.aggregate.passive_backlog);
                formData.append('marks_type', this.student.marks_type);
                formData.append('percentage', this.aggregate.percentage);
                formData.append('semester_status', this.student.semester_status);
                formData.append('_method', 'PUT');
                // console.log(this.$store.state.auth.username);
                // console.log('1');
                // console.log(this.student);
                axios.post(storeStudentAggregateURL + this.student.id, formData).then(response => {
                    console.log(response);
                    axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {
                        if (statusresponse.status == 200) {
                            // toastr['success']("User Added!!");
                            // this.$parent.step = 5;
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
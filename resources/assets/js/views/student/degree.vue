<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Degree Details</h2>

                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="semester" v-model="student.semester" placeholder="Semester"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-2 col-form-label">Marks Type : </label>
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
                                        <input type="number" name="obtained" min="0" max="10" step="0.1" v-model="student.obtained_marks"
                                            placeholder="Obtained Marks" class="form-control" v-on:input="percentCalculate()"
                                            v-if="this.student.marks_type=='CGPA'">
                                        <input type="text" name="obtained" v-model="student.obtained_marks" placeholder="Obtained Marks"
                                            class="form-control" v-on:input="percentCalculate()" v-else>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="max" v-model="student.max_marks" class="form-control"
                                            placeholder="10" value="10" disabled v-if="this.student.marks_type=='CGPA'">
                                        <input type="text" name="max" v-model="student.max_marks" placeholder="Max Marks"
                                            class="form-control" v-on:input="percentCalculate()" v-else>
                                        <small id="percent" class="form-text text-muted">Percent = {{ percent }}%
                                        </small>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" step="1" min="0" value="0" name="credits" v-model="student.credits" class="form-control"
                                            placeholder="Credits">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="active_backlog" v-model="student.active_backlog" class="form-control" step="1" min="0" value="0"
                                            placeholder="Active Backlog">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="passive_backlog" step="1" min="0" value="0" v-model="student.passive_backlog"
                                            class="form-control" placeholder="Passive Backlog">

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
        storeStudentDegreeURL,
        formstepChangeURL,
        fetchProfileURL
    } from "../../config.js";
    export default {
        data() {
            return {
                student: {},
                percent: 0,
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
            }
        },
        created() {
            axios.get('/api/dashboard/student/sem/' + this.$parent.username + '/edit').then(response => {
                console.log(response.data.data[0]);
                this.student = response.data.data[0];
                this.splitarray(this.student.semester);
                this.percent = response.data.data[0].percentage;
            }).catch(error => {
                console.log(error);
            });
            console.log(this.id.student);
        },
        methods: {
            splitarray(arr){
                console.log(arr.split(','));   
            },
            resetmarks() {
                this.percent = 0;
                this.student.obtained_marks = undefined;
                this.student.max_marks = undefined;
            },
            percentCalculate() {
                if (this.student.obtained_marks != undefined && this.student.max_marks != undefined) {
                    this.percent = (this.student.obtained_marks / this.student.max_marks) * 100;
                } else {
                    this.percent = 0;
                }
            },
            getAuthUser(name) {
                return this.$store.getters.getAuthUser(name);
            },
            splitMonthYear(monthYear) {
                this.student.month = monthYear.split('-')[1];
                this.student.year = monthYear.split('-')[0];
            },
            submit() {
                let formData = new FormData();
                formData.append('univ_roll_no', this.student.univ_roll_no);
                formData.append('board', this.student.board);
                formData.append('institute', this.student.institute);
                formData.append('month', this.student.month);
                formData.append('year', this.student.year);
                formData.append('obtained_marks', this.student.obtained_marks);
                formData.append('max_marks', this.student.max_marks);
                formData.append('education', this.student.education);
                formData.append('jee_rank', this.student.jee_rank);
                formData.append('year_gap', this.student.year_gap);
                formData.append('percentage', this.percent);
                formData.append('_method', 'PUT');
                console.log(this.student.month);
                console.log(this.student.year);
                // console.log(this.$store.state.auth.username);
                // console.log('1');
                axios.post(storeStudentDegreeURL + this.student.id, formData).then(response => {
                    axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {
                        if (statusresponse.status == 200) {
                            // toastr['success']("User Added!!");
                            this.$parent.step = 5;
                            // this.$router.push('/req');

                        }
                    }).catch(errors => {
                        console.log(errors);
                    });
                    console.log(response);
                    //                                                               if (response.status == 200) {

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
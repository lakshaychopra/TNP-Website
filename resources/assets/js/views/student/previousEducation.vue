<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Previous Education Details</h2>

                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="board" v-model="student.board" placeholder="Board"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="institute_name" v-model="student.institute"
                                            placeholder="Institute Name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="month" name="month" v-model="monthYear" placeholder="Month" class="form-control"
                                            v-on:change="splitMonthYear(monthYear)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 col-form-label">Education Type : </label>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="education" id="XII" v-model="student.education"
                                                value="XII" v-on:change="resetmarks()">
                                            <label for="XII">XII</label>
                                        </div>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="education" id="DIPLOMA" v-model="student.education"
                                                value="DIPLOMA" v-on:change="resetmarks()">
                                            <label for="DIPLOMA">DIPLOMA</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" name="obtained" min="0" v-model="student.obtained_marks"
                                            placeholder="Obtained Marks" class="form-control" v-on:input="percentCalculate()">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" name="max" v-model="student.max_marks" class="form-control"
                                            placeholder="Max Marks" v-on:input="percentCalculate()">
                                        <small id="percent" class="form-text text-muted">Percent = {{ percent }}%
                                        </small>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 ml-auto">
                                    <div class="form-group">
                                        <input type="number" name="jee" v-model="student.jee_rank" class="form-control"
                                            placeholder="Jee Rank">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" name="gap" step="1" min="0" value="0" v-model="student.year_gap"
                                            class="form-control" placeholder="Year Gap">

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
        storeStudentPeURL,
        formstepChangeURL,
        fetchProfileURL
    } from "../../config.js";
    export default {
        data() {
            return {
                student: {},
                percent: 0,
                id: this.$store.state.auth.userid,
                monthYear: '',
                month: '',
                year: '',
                profile: {
                    'univ_roll_no': this.$store.state.auth.username,
                },
                statusChange: {
                    'student_form_step': 'DEGREE',
                    'id': this.$store.state.auth.userid,
                },
            }
        },
        created() {
            axios.get('/api/dashboard/student/pe/' + this.$store.state.auth.username + '/edit').then(response => {
                console.log(response.data.data[0]);
                this.student = response.data.data[0];
                this.monthYear = response.data.data[0].year + '-' + response.data.data[0].month;
                this.percent = response.data.data[0].percentage;
            }).catch(error => {
                console.log(error);
            });
            console.log(this.id.student);
        },
        methods: {
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
                axios.post(storeStudentPeURL + this.student.id, formData).then(response => {
                    axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {
                        if (statusresponse.status == 200) {
                            // toastr['success']("User Added!!");
                            // this.$router.push('/userlogin');
                            this.$parent.step = 5;

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
<template>
  <div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-material card">
          <div class="card-body">
            <h2 class="card-title mt-3 text-primary">Profile Details</h2>

            <form method="post" @submit.prevent="validateForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">
                      <em id="tusername" class="tooltip">Enter your full name. Don't use any prefixes i.e.
                        Mr./Ms./Miss etc.</em>
                    </label>
                    <input type="text" id="username" v-validate="'required'" name="name" v-model="student.name"
                      placeholder="Name" class="form-control text-capitalize" @focus="tooltip()" @focusout="removetooltip()">
                    <small class="form-text text-primary text-uppercase">Name
                      <span class="text-danger pull-right">{{errors.first('name')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                     <label for="dob"></label>
                    <input type="date" v-validate="'required'" name="dob" v-model="student.dob"
                      placeholder="D.O.B." class="form-control" >
                    <small class="form-text text-primary text-uppercase">Date of Birth
                      <span class="text-danger pull-right">{{errors.first('dob')}}</span>
                    </small>                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender" class="col-md-2 col-form-label">Gender : </label>
                    <div class="col-md-2 md-radio md-radio-inline">
                      <input type="radio" v-validate="'required'" name="gender" v-model="student.gender" id="male"
                        value="MALE">
                      <label for="male">MALE</label>
                    </div>
                    <div class="col-md-2 md-radio md-radio-inline">
                      <input type="radio" name="gender" v-model="student.gender" id="female" value="FEMALE">
                      <label for="female">FEMALE</label>
                    </div>
                    <small class="text-danger text-uppercase">{{ errors.first('gender') }}</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <select id="category" name="category" v-validate="'required'" v-model="student.category" :class="{'form-control': true, 'error': errors.has('category')}">
                      <option disabled selected value="">Category</option>
                      <option value="GENERAL">GENERAL</option>
                      <option value="SC">SC</option>
                      <option value="ST">ST</option>
                      <option value="OBC">OBC</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Category
                      <span v-show="errors.has('category')" class="text-danger pull-right">{{errors.first('category')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" maxlength="4" v-validate="'required|numeric|length:3|max:4'" max="9999" id="height"
                      min="0" name="height" v-model="student.height" placeholder="Height" class="form-control">
                    <small class="form-text text-primary text-uppercase">Height
                      <span class="text-danger pull-right">{{errors.first('height')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" maxlength="4" min="0" v-validate="'required|numeric|max:4'" max="9999" name="weight"
                      v-model="student.weight" placeholder="Weight" class="form-control">
                    <small class="form-text text-primary text-uppercase">Weight
                      <span class="text-danger pull-right">{{errors.first('weight')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="blood_group" v-validate="'required'" v-model="student.blood_group" :class="{'form-control': true, 'error': errors.has('blood_group')}">
                      <small class="form-text text-primary text-uppercase">Weight</small>
                      <option disabled value="">Blood Group</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Blood Group
                      <span class="text-danger pull-right">{{errors.first('blood_group')}}</span>
                    </small>
                  </div>
                </div>
              </div>

              <h2 class="card-title mt-3 text-primary">Academic Details</h2>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" min="0" name="uniRoll" v-model="student.univ_roll_no" placeholder="University Roll No."
                      class="form-control" disabled>
                    <small class="form-text text-primary text-uppercase">University Roll No.</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" min="0" maxlength="7" name="Class Roll No" v-model="student.class_roll_no"
                      placeholder="Class Roll No." class="form-control" v-validate="'required|numeric|length:7'">
                    <small class="form-text text-primary text-uppercase">Class Roll No.
                      <span class="text-danger pull-right">{{errors.first('Class Roll No')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="living" :class="{'form-control': true, 'error': errors.has('living')}" v-model="student.living"
                      v-validate="'required'">
                      <option disabled value="">HOSTELER / DAY SCHOLAR</option>
                      <option value="HOSTELER">HOSTELER</option>
                      <option value="DAYSCHOLAR">DAY SCHOLAR</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">HOSTELER / DAY SCHOLAR
                      <span class="text-danger pull-right">{{errors.first('living')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" name="batch" v-model="student.batch" placeholder="Batch" v-validate="'required'"
                      class="form-control">
                    <small class="form-text text-primary text-uppercase">Batch
                      <span class="text-danger pull-right">{{errors.first('batch')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="branch" v-validate="'required'" v-model="student.branch_type" :class="{'form-control': true, 'error': errors.has('branch')}">
                      <option disabled value="">Branch</option>
                      <option value="B.TECH.">B.Tech.</option>
                      <option value="M.TECH.">M.Tech.</option>
                      <option value="M.B.A.">M.B.A.</option>
                      <option value="M.C.A.">M.C.A.</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Branch
                      <span class="text-danger pull-right">{{errors.first('branch')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="stream" v-validate="'required'" :class="{'form-control': true, 'error': errors.has('branch')}"
                      v-model="student.stream">
                      <option disabled value="">Stream</option>
                      <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                      <option value="COMPUTER SCIENCE AND ENGINEERING">COMPUTER SCIENCE AND ENGINEERING</option>
                      <option value="ELECTRICAL ENGINEERING">ELECTRICAL ENGINEERING</option>
                      <option value="ELECTRONICS AND COMMUNICATION ENGINEERING">ELECTRONICS AND COMMUNICATION
                        ENGINEERING
                      </option>
                      <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
                      <option value="MECHANICAL ENGINEERING">MECHANICAL ENGINEERING</option>
                      <option value="PRODUCTION ENGINEERING">PRODUCTION ENGINEERING</option>
                      <option value="N.A.">N.A.</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Stream
                      <span class="text-danger pull-right">{{errors.first('stream')}}</span>
                    </small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <select name="section" v-validate="'required'" :class="{'form-control': true, 'error': errors.has('section')}"
                      v-model="student.section">
                      <option disabled value="">Section</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="E">E</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Section
                      <span class="text-danger pull-right">{{errors.first('section')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="shift" v-model="student.shift" v-validate="'required'" :class="{'form-control': true, 'error': errors.has('branch')}">
                      <option value="" disabled>Shift</option>
                      <option value="MORNING">MORNING</option>
                      <option value="EVENING">EVENING</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Shift
                      <span class="text-danger pull-right">{{errors.first('shift')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="training_semester" v-model="student.training_semester" v-validate="'required'" :class="{'form-control': true, 'error': errors.has('branch')}">
                      <option value="" disabled>Training Semester</option>
                      <option value="7">7th Semester</option>
                      <option value="8">8th Semester</option>
                      <option value="0">N.A.</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">Training Semester
                      <span class="text-danger pull-right">{{errors.first('training_semester')}}</span>
                    </small>
                  </div>
                </div>
              </div>

              <h2 class="card-title mt-3 text-primary">Parent Details</h2>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fathername">
                      <em id="tusername" class="tooltip">Enter full name. Don't use any prefixes i.e.
                        Mr./Sr. </em>
                    </label>
                    <input type="text" id="fathername" name="father name" v-validate="'required'" v-model="student.father_name"
                      placeholder="Father's Name" class="form-control text-capitalize"  @focus="tooltip()" @focusout="removetooltip()">
                    <small class="form-text text-primary text-uppercase">Father's Name
                      <span class="text-danger pull-right">{{errors.first('father name')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="tel" v-validate="'required|numeric|length:10'" name="father phone" v-model="student.father_phone"
                      placeholder="Father's Phone" class="form-control" maxlength="10" min="0">
                    <small class="form-text text-primary text-uppercase">Father's Phone Number
                      <span class="text-danger pull-right">{{errors.first('father phone')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mothername">
                      <em id="tusername" class="tooltip">Enter full name. Don't use any prefix i.e.
                        Mrs. </em>
                    </label>
                    <input type="text" id="mothername" v-validate="'required'" name="mother name" v-model="student.mother_name"
                      placeholder="Mother's Name" class="form-control text-capitalize"  @focus="tooltip()" @focusout="removetooltip()">
                    <small class="form-text text-primary text-uppercase">Mother's Name
                      <span class="text-danger pull-right">{{errors.first('mother name')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="tel" v-validate="'required|numeric|length:10'" name="mother phone" v-model="student.mother_phone"
                      placeholder="Mother's Phone" class="form-control" maxlength="10" min="0 ">
                    <small class="form-text text-primary text-uppercase">Mother's Phone Number
                      <span class="text-danger pull-right">{{errors.first('mother phone')}}</span>
                    </small>
                  </div>
                </div>
              </div>

              <h2 class="card-title mt-3 text-primary">Address Details</h2>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <input v-validate="'required'" type="text" name="address" v-model="student.address" placeholder="Address"
                      class="form-control text-capitalize">
                    <small class="form-text text-primary text-uppercase">Address
                      <span class="text-danger pull-right">{{errors.first('address')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input v-validate="'required'" type="text" name="city" v-model="student.city" placeholder="City"
                      class="form-control text-capitalize">
                    <small class="form-text text-primary text-uppercase">City
                      <span class="text-danger pull-right">{{errors.first('city')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input v-validate="'required'" type="text" name="district" v-model="student.district" placeholder="District"
                      class="form-control text-capitalize">
                    <small class="form-text text-primary text-uppercase">District
                      <span class="text-danger pull-right">{{errors.first('district')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input v-validate="'required'" type="text" name="state" v-model="student.state" placeholder="State"
                      class="form-control text-capitalize">
                    <small class="form-text text-primary text-uppercase">State
                      <span class="text-danger pull-right">{{errors.first('state')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input v-validate="'required|numeric|length:6'" type="number" min="0" name="pincode" v-model="student.pincode"
                      placeholder="Pincode" class="form-control" maxlength="7">
                    <small class="form-text text-primary text-uppercase">Pincode
                      <span class="text-danger pull-right">{{errors.first('pincode')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg pull-right">
                    <span v-if="!load">Submit
                      </span> 
                      <span v-else>
                        <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                      </span>
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
        inputid: '',
        profile: {
          'univ_roll_no': this.$store.state.auth.username,
          // 'id': this.$store.state.auth.userid,
        },
        statusChange: {
          'student_form_step': 'PROFILE',
          'id': this.$parent.id,
        },
        load:false
      };
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
      tooltip() {
        console.log('#t' + $('input').attr('id'));
        $('#t' + $('input').attr('id')).addClass('tooltip--active').removeClass('tooltip');
      },
      removetooltip() {
        $('#t' + $('input').attr('id')).addClass('tooltip').removeClass('tooltip--active');
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
      getAuthUser(name) {
        return this.$store.getters.getAuthUser(name);
      },
      submit() {
        this.load=true
        let formData = new FormData();
        formData.append('name', this.student.name.toUpperCase());
        formData.append('gender', this.student.gender);
        formData.append('dob', this.student.dob);
        formData.append('category', this.student.category);
        formData.append('height', this.student.height);
        formData.append('weight', this.student.weight);
        formData.append('blood_group', this.student.blood_group);
        formData.append('univ_roll_no', this.student.univ_roll_no);
        formData.append('class_roll_no', this.student.class_roll_no);
        formData.append('living', this.student.living);
        formData.append('batch', this.student.batch);
        formData.append('branch_type', this.student.branch_type);
        formData.append('stream', this.student.stream.toUpperCase());
        formData.append('section', this.student.section.toUpperCase());
        formData.append('shift', this.student.shift);
        formData.append('training_semester', this.student.training_semester);
        formData.append('father_name', this.student.father_name.toUpperCase());
        formData.append('father_phone', this.student.father_phone);
        formData.append('mother_name', this.student.mother_name.toUpperCase());
        formData.append('mother_phone', this.student.mother_phone);
        formData.append('address', this.student.address.toUpperCase());
        formData.append('city', this.student.city.toUpperCase());
        formData.append('district', this.student.district.toUpperCase());
        formData.append('state', this.student.state.toUpperCase());
        formData.append('pincode', this.student.pincode);
        formData.append('_method', 'PUT');
        // console.log(this.id.id);
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
          // console.log(response);
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

  label {
    position: relative;
  }

  .tooltip {
    position: absolute;
    top: -50px;
    left: 0;
    padding: 0.75rem 1rem;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
  }

  .tooltip--active {
    font-size: 0.83333rem;
    line-height: 1.2;
    color: #323232;
    background-color: #e5e5e5;

    &:after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 15px;
      display: block;
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 10px 10px 0 10px;
      border-color: #e5e5e5 transparent transparent transparent;
    }
  }

</style>

<template>
  <div class="row"> 
    <div class="col-sm-12">  
      <form method="post" @submit.prevent="validateForm">

<!-- Diploma/XII selector-->

       <div class="row">
        <div class="col-sm-12">
          <div class="form-material card">
            <div class="card-body">
              <div class="text-center" v-on:change="selection()">
                <div class="form-group" id="select_option"  >
                  <label for="" class="col-md-2 col-form-label">Education Type : </label>
                  <div class="col-md-1 md-radio md-radio-inline">
                    <input v-validate="'required'" type="radio" name="education" id="XII" v-model="student.education" value="XII">
                    <label for="XII">XII</label>
                  </div>
                  <div class="col-md-1 md-radio md-radio-inline">
                    <input type="radio" name="education" id="DIPLOMA" v-model="student.education" value="DIPLOMA">
                    <label for="DIPLOMA">DIPLOMA</label>
                  </div>
                  <div class="col-md-2 md-radio md-radio-inline">
                    <input type="radio" name="education" id="BOTH" v-model="student.education" value="BOTH">
                    <label for="BOTH">BOTH</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>

<!--  XII section -->  

      <div class="row" id="twelth">
        <div class="col-sm-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">XII Details</h2>
                <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Board</small>
                      <select name="board" :class="{'form-control': true, 'error': errors.has('board')}" v-model="student.XII_board"
                        v-validate="'required'">
                        <!-- <option disabled value="">HOSTELER / DAY SCHOLAR</option> -->
                        <option value="CBSE">CBSE</option>
                        <option value="ICSE">ICSE </option>
                        <option value="PSEB">PSEB</option>
                        <option value="BSEB">BSEB</option>
                        <option value="Others">State Board</option>
                      </select>
                      
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Institute Name</small>
                      <input type="text" name="institute_name" v-model="student.XII_institute" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Jee Rank</small>
                        <input type="text" v-validate="'required'" name="jee_rank" v-model="student.jee_rank" class="form-control">
                      <span class="text-danger pull-right">{{errors.first('jee_rank')}}</span>
                    </div>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Year of Passing</small>
                      <input type="numeric" id='XII_year' name="year" v-model="student.XII_year" class="form-control" v-on:input="gap_calculator()">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Obtained Marks</small>
                      <input type="number" name="obtained" min="0" v-model="student.XII_obtained_marks" v-validate="'required'" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="small text-primary text-uppercase">Max Marks</span>
                      <input type="number" name="max" v-model="student.XII_max_marks" class="form-control"  v-validate="'required'" v-on:input="percentCalculate1()">
                      <span id="XII_percent"  class="small text-muted pull-right">Percent = {{ XII_percent }}%</span>
                    </div>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group files">
                      <input type="file" v-validate="'required'" accept="application/pdf" class="form-control" ref="file1" name="file1" id="imageUrl1">
                      <small class="form-text text-primary text-uppercase">Upload Scanned Certificate (.pdf) 
                      </small>
                   </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
       </div>

<!-- Diploma Section -->

       <div class="row" id="Diploma">
        <div class="col-sm-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">Diploma Details</h2>
                <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Course</small>
                        <input type="text" v-validate="'required'" name="course" v-model="student.course" class="form-control">
                      <span class="text-danger pull-right">{{errors.first('course')}}</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Institute Name</small>
                      <input type="text" name="institute_name" v-model="student.diploma_institute" class="form-control">
                    </div>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Year of Passing</small>
                      <input type="numeric" name="year" id="diploma_year" v-model="student.diploma_year" class="form-control" v-on:input="gap_calculator()">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <small class="form-text text-primary text-uppercase">Obtained Marks</small>
                      <input type="number" name="obtained" min="0" v-model="student.diploma_obtained_marks" v-validate="'required'" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="small text-primary text-uppercase">Max Marks</span>
                      <input type="number" name="max" v-model="student.diploma_max_marks" class="form-control"  v-validate="'required'" v-on:input="percentCalculate2()">
                      <span id="diploma_percent" class="small text-muted pull-right">Percent = {{ diploma_percent }}% </span>
                    </div>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group files">
                      <input type="file" v-validate="'required'" accept="application/pdf" class="form-control" ref="file2" name="file2" id="imageUrl2">
                      <small class="form-text text-primary text-uppercase">Upload Scanned Certificate (.pdf) 
                      </small>
                   </div>
                  </div>
                </div>
            </div>
          </div>
         </div>
       </div>
      
<!-- Submit -->

        <div class="row" id="submit">
            <div class="col-md-3">
               <div class="form-group">
                 <div class="input-group md-3">
                   <div class="input-group-prepend">
                    <small class="input-group-text text-uppercase">Year Gap</small>
                 </div>
                 <input type="number"  v-validate="'required'" name="gap" v-model="student.year_gap" class="form-control" disabled>
                </div>
              </div>
            </div>
            <div class="col-sm-9 ml-auto">
               <div class="form-group">
                <button type="submit" value="Submit" class="btn btn-info btn-lg pull-right">
                  <span v-if="!load">Submit</span> 
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
        student: {
          education: '',
          year_gap: '',
          XII_institute: '',
          XII_year: '',
          XII_obtained_marks: '',
          XII_max_marks: '',
          diploma_institute: '',
          diploma_obtained_marks: '',
          diploma_max_marks: '',
          jee_rank:''
        },
        diploma_percent: 0,
        imageUrl1 : null,
        imageUrl2 : null,
        XII_percent: 0,
        id: this.$parent.id,
        tt_gap: 0,
        year_joining: 2017,
        year: 0,
        profile: {
          'univ_roll_no': this.$parent.username,
        },
        statusChange: {
          'student_form_step': 'PREVIOUS_EDUCATION',
          'id': this.$parent.id,
        },
        load:false
      };
    },
    created() {
      axios.get('/api/dashboard/student/me/' + this.$parent.username + '/edit').then(response => {
        // console.log(response.data.data[0].year);
        this.year = response.data.data[0].year;
      }).catch(error => {
        console.log(error);
      });

      axios.get('/api/dashboard/student/pe/' + this.$parent.username + '/edit').then(response => {
        //console.log(response.data.data[0]);
        // console.log(1);
        this.student = response.data.data[0];
        this.percent = response.data.data[0].percentage;
      }).catch(error => {
        console.log(error);
      });
      // console.log(this.id.student);
    },
    methods: { 
      selection(){
        if( this.student.education == 'XII'){
          $("#Diploma").hide();
          $("#twelth").show();
          $("#Diploma :input").attr("disabled",true);
          $("#twelth :input").attr("disabled",false);
        }
        else if(this.student.education == 'DIPLOMA'){
          $("#twelth").hide();
          $("#Diploma").show();
          $("#twelth :input").attr("disabled",true);
          $("#Diploma :input").attr("disabled",false);
        }
        else{
          $("#twelth").show();
          $("#Diploma").show();
          $("#twelth :input").attr("disabled",false);
          $("#Diploma :input").attr("disabled",false);
        }
        this.student.year_gap = undefined;
        $('#submit').show();
      },
      // resetmarks() {
      //   this.percent = 0;
      //   this.student.obtained_marks = undefined;
      //   this.student.max_marks = undefined;
      // },
       percentCalculate1() {
        if (this.student.XII_obtained_marks != undefined && this.student.XII_max_marks != undefined) {
          this.XII_percent = parseFloat((this.student.XII_obtained_marks / this.student.XII_max_marks) * 100).toFixed(3);
       } 
        else{
          this.XII_percent = 0;
        }
       },
      percentCalculate2() {
        if(this.student.diploma_obtained_marks != undefined && this.student.diploma_max_marks != undefined){
          this.diploma_percent = parseFloat((this.student.diploma_obtained_marks / this.student.diploma_max_marks) * 100).toFixed(3);
        }
        else {
          this.diploma_percent = 0;
        }
      },
      gap_calculator(){
        this.tt_gap = this.student.XII_year-this.year;
        if(this.tt_gap > 2){
          this.tt_gap = this.tt_gap-2;
        }
        else{
          this.tt_gap = 0;
        }
        // console.log(this.student.XII_year);
        // var gap = this.student.year_gap;
        // console.log(document.getElementById('XII_year').value.length);
        if(this.student.XII_year <= this.year_joining || this.student.diploma_year <= this.year_joining ){
          if(document.getElementById('XII_year').value.length == 4 ||document.getElementById('diploma_year').value.length == 4){
            if( this.student.education == 'XII' || this.student.education == 'BOTH'){
              // console.log('1111');
              // console.log(this.student.year);
                this.student.year_gap = this.year_joining - this.student.XII_year;
                if(this.student.year_gap>0){
                  this.student.year_gap = this.student.year_gap + this.tt_gap;
                }
                else{
                  this.student.year_gap = 0 + this.tt_gap;
                }
              }
            else if(this.student.education == 'DIPLOMA'){
              // console.log(this.student.diploma_year);
              this.student.year_gap = this.year_joining - this.student.diploma_year;
              if(this.student.year_gap>0){
                this.student.year_gap = this.student.year_gap + this.tt_gap;
              }
              else{
                this.student.year_gap = 0 + this.tt_gap;
              }
            }
          }
          else{
            this.student.year_gap = undefined;
          }
        }
        else{
        this.student.year_gap = undefined;
      }
      },
      getAuthUser(name) {
        return this.$store.getters.getAuthUser(name);
      },
      //splitMonthYear(monthYear) {
      //  this.student.month = monthYear.split('-')[1];
      //  this.student.year = monthYear.split('-')[0];
      //},
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
      submit() {
        //console.log(this.XII_percent);
        //console.log(this.diploma_percent);
        this.load=true;
        let formData = new FormData();
        formData.append('univ_roll_no', this.student.univ_roll_no);
        formData.append('education', this.student.education);
        formData.append('year_gap', this.student.year_gap);
        formData.append('XII_board', this.student.XII_board);
        formData.append('XII_institute', this.student.XII_institute);
        formData.append('XII_year', this.student.XII_year);
        formData.append('XII_obtained_marks', this.student.XII_obtained_marks);
        formData.append('XII_max_marks', this.student.XII_max_marks);
        formData.append('XII_percentage', this.XII_percent);
        formData.append('jee_rank', this.student.jee_rank);
        var imagefile = document.querySelector('#imageUrl1');
        formData.append('XII_previous_edu_certificate', imagefile.files[0]);
        formData.append('diploma_board', this.student.diploma_board);
        formData.append('diploma_institute', this.student.diploma_institute);
        formData.append('diploma_year', this.student.diploma_year);
        formData.append('diploma_obtained_marks', this.student.diploma_obtained_marks);
        formData.append('diploma_max_marks', this.student.diploma_max_marks);
        formData.append('diploma_percentage', this.diploma_percent);
        
        var imagefile = document.querySelector('#imageUrl2');
        formData.append('diploma_previous_edu_certificate', imagefile.files[0]);
        formData.append('_method', 'PUT');
        //console.log(this.student);
        axios.post(storeStudentPeURL + this.student.id, formData,{headers: {'Content-Type': 'multipart/form-data'}}
         ).then(response => {
          axios.post(formstepChangeURL, this.statusChange).then(statusresponse => {
            if (statusresponse.status == 200) {
              // toastr['success']("User Added!!");
              this.$parent.step = 5;
              // this.$router.push('/req');

            }
          }).catch(errors => {
            console.log(errors);
          });
        }).catch(error => {
          console.log(error);
        });
      }
    }
  }

</script>
<style >
  .text-primary {
    color: #0185c2 !important;
  }

  .col-form-label {
    padding-left: 0;
  }

  #select_option{
    margin-bottom: 0px !important;
  }
  #Diploma,#twelth,#submit{
    display: none;
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

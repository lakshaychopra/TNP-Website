<template>
  <div>
    <!-- <h3 class="card-title mt-3 display-5 text-primary">PROFILE DETAILS</h3> -->
    <form method="post" @submit.prevent="submit">
      <fieldset disabled="disabled">
        <h3
          class="card-title mt-3 display-6 text-primary"
          style="text-align: center;"
        >PROFILE DETAILS</h3>
        <br />
        <div class="row">
          <div class="col-12">
            <div class="form-material card">
              <div class="card-body">
                <h2 class="card-title mt-3 text-primary">Personal & Address Details</h2>
                <div class="row">
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.first_name" />
                    <label for="id_username">First Name</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.last_name" />
                    <label for="id_username">Last Name</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.mail_id" />
                    <label for="id_username">Email</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.whatsapp_cont" />
                    <label for="id_username">Whatsapp Contact</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.phone_number" />
                    <label for="id_username">Contact Number</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.gender" />
                    <label for="id_username">Gender</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.height" />
                    <label for="id_username">Height</label>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.weight" />
                    <label for="id_username">Weight</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.blood_group" />
                    <label for="id_username">Blood Group</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" v-model="student.dob" />
                    <label for="id_username">DOB</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" v-model="student.category" />
                    <label for="id_username">Category</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" v-model="student.father_name" />
                    <label for="id_username">Father Name</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" v-model="student.father_phone" />
                    <label for="id_username">Father Contact</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" v-model="student.father_occupation" />
                    <label for="id_occupation">Father's Occupation</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" v-model="student.farming_background" />
                    <label for="id_farming">Farming Background</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" v-model="student.mother_name" />
                    <label for="id_username">Mother Name</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" v-model="student.mother_phone" />
                    <label for="id_username">Mother Contact</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" v-model="student.address" />
                    <label for="id_username">Address</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.city" />
                    <label for="id_username">City</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.state" />
                    <label for="id_username">State</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.district" />
                    <label for="id_username">District</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.pincode" />
                    <label for="id_username">Pincode</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-material card">
              <div class="card-body">
                <h2 class="card-title mt-3 text-primary">College Details</h2>
                <div class="row">
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.univ_roll_no" />
                    <label for="id_username">University Roll No</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.class_roll_no" />
                    <label for="id_username">Class Roll No</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.batch" />
                    <label for="id_username">Batch</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.living" />
                    <label for="id_username">Hostler/Day Scholar</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.stream" />
                    <label for="id_username">Course</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.shift" />
                    <label for="id_username">Shift</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.section" />
                    <label for="id_username">Section</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.branch_type" />
                    <label for="id_username">Branch Type</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-material card">
              <div class="card-body">
                <h2 class="card-title mt-3 text-primary">10th Details</h2>
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control" v-model="student.tenth_institue" />
                    <label for="id_username">Institute Name</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.tenth_board" />
                    <label for="id_username">Board</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" v-model="student.tenth_percentage" />
                    <label for="id_username">Percentage</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" v-model="student.tenth_year" />
                    <label for="id_username">Year of Passing</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-material card">
              <div class="card-body">
                <div v-if="student.education == 'XII' || student.education=='BOTH'">
                  <h2 class="card-title mt-3 text-primary">12th Details</h2>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.XII_institute" />
                      <label for="id_username">Institute Name</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.XII_board" />
                      <label for="id_username">Board</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.XII_percentage" />
                      <label for="id_username">Percentage</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.XII_year" />
                      <label for="id_username">Year of Passing</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.year_gap" />
                      <label for="id_username">Year Gap</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.jee_rank" />
                      <label for="id_username">JEE Rank</label>
                    </div>
                  </div>
                </div>
                <div v-if="student.education == 'Diploma'|| student.education=='BOTH'">
                  <h2 class="card-title mt-3 text-primary">Diploma Details</h2>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" v-model="student.diploma_institute" />
                      <label for="id_username">Institute Name</label>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" v-model="student.diploma_board" />
                      <label for="id_username">Board</label>
                    </div>
                    <div class="col-md-2">
                      <input
                        type="text"
                        class="form-control"
                        v-model="student.diploma_obtained_marks"
                      />
                      <label for="id_username">Obtained Marks</label>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" v-model="student.diploma_max_marks" />
                      <label for="id_username">Max Marks</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" class="form-control" v-model="student.diploma_percentage" />
                      <label for="id_username">CGPA/Percentage</label>
                    </div>
                    <div class="col-md-5">
                      <input type="text" class="form-control" v-model="student.diploma_year" />
                      <label for="id_username">Year of Passing</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <div
          class="row"
          v-if="student.branch_type == 'M.B.A.' || student.branch_type == 'M.C.A.' || student.branch_type == 'M.TECH.'"
        >
          <div class="col-12">
            <div class="form-material card">
              <div class="card-body">
                <h2 class="card-title mt-3 text-primary">Graduation</h2>
                <div class="row">
                  <div class="col-md-6 input-control">
                    <input type="text" class="form-control" v-model="student.branch_type" />
                    <label for="crs">Course</label>
                  </div>
                  <div class="col-md-6 input-control" v-if="student.spec_mba != null">
                    <input type="text" class="form-control" v-model="student.spec_mba" />
                    <label for="spec">Specialization(Post-Graduation)</label>
                  </div>
                  <div class="col-md-6 input-control" v-if="student.spec_mtech != null">
                    <input type="text" class="form-control" v-model="student.spec_mba" />
                    <label for="spec">Specialization(Post-Graduation)</label>
                  </div>

                  <div class="col-md-4 input-control">
                    <input type="text" class="form-control" v-model="student.work_experience" />
                    <label for="work">Work Experience (in months)</label>
                  </div>
                  <div class="col-md-4 input-control">
                    <input type="text" class="form-control" v-model="student.graduation" />
                    <label for="pass">Graduation</label>
                  </div>
                  <div class="col-md-4 input-control">
                    <input type="text" class="form-control" v-model="student.specialization" />
                    <label for="pass">Specialization(Graduation)</label>
                  </div>
                  <div class="col-md-4 input-control">
                    <input type="text" class="form-control" v-model="student.passing_year" />
                    <label for="pass">Passing Year</label>
                  </div>
                  <div class="col-md-4 input-control" v-if="student.marks_type == 'PERCENTAGE'">
                    <input type="text" class="form-control" />
                    <label for="cgpa">Percentage</label>
                  </div>
                  <div class="col-md-4 input-control" v-else-if="student.marks_type == 'CGPA'">
                    <input type="text" name="cgpa" class="form-control" />
                    <label for="cgpa">CGPA</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="text-center" v-if="student.verify_status==0">
              <button type="submit" class="btn btn-primary card-footer col-md-6">
                <span v-if="!load">Verify</span>
                <span v-else>
                  <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                </span>
              </button>
            </div>

            <div class="text-center" v-else>
              <button
                type="submit"
                title="You have already verified this data !!"
                class="btn btn-success card-footer col-md-6"
                disabled
              >Already Verified :)</button>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="card-body">
              
            </div>
          </div>
        </div>
      </div>-->
      <!-- <h2 class="card-title mt-3 text-primary">Semester-6</h2>
    <hr class="style3">
  <div class="row">
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.sem_obt_marks_6">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.credits_6">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.active_backlog_6">
       <label for="id_username"> Active Backlog</label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.passive_backlog_6">
       <label for="id_username"> Passive Backlog </label>
    </div>
      </div>-->
      <!-- <h2 class="card-title mt-3 text-primary">Semester-7 </h2>
    <hr class="style3">
    <div class="row">
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.sem_obt_marks_7">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.credits_7">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.active_backlog_7">
       <label for="id_username"> Active Backlog</label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.passive_backlog_7">
       <label for="id_username"> Passive Backlog </label>
    </div>
</div>
  
     <h2 class="card-title mt-3 text-primary">Semester-8 </h2>
    <hr class="style3">
   <div class="row">
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.sem_obt_marks_8">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.credits_8">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.active_backlog_8">
       <label for="id_username"> Active Backlog</label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.passive_backlog_8">
       <label for="id_username"> Passive Backlog </label>
    </div>
      </div>-->

      <!-- <h2 class="card-title mt-3 text-primary">Aggregate</h2>
    <hr class="style3">
  <div class="row">
    <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.percentage_aggregate">
      <label for="id_username" > Percentage</label>
    </div>
    <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.sgpa_aggregate">
      <label for="id_username" >SGPA </label>
    </div>
     <div class="col-md-2">
          
      <input type="text" class="form-control" v-model="student.passive_backlog_aggregate">
      <label for="id_username" >Passive Backlog </label>
    </div>
    <div class="col-md-2">
          
      <input type="text" class="form-control" v-model="student.active_backlog_aggregate">
      <label for="id_username" >Active Backlog </label>
    </div> 
    
    <div class="col-md-2">
          
      <input type="text" class="form-control" v-model="student.credits_aggregate">
      <label for="id_username" >Credits </label>
    </div>
  
      </div>-->
    </form>
  </div>
</template>
<script>
import {
  storeStudentURL,
  formstepChangeURL,
  firstLoginviewStudentProfileURL,
  viewStudentProfileURL
} from "../../config.js";
import { fetchProfileURL } from "../../config.js";
export default {
  data() {
    return {
      userid: this.$store.state.auth.userid,
      username: this.$store.state.auth.username,
      student: {},
      profile: {
        univ_roll_no: this.$parent.username
      },
      comment: "",
      load: false,
      form_step: {
        student_form_step: "DEGREE",
        id: this.$parent.id
      }
    };
  },
  created() {
    axios
      .get("/api/dashboard/student/profile/" + this.username + "/edit")
      .then(response => {
        console.log("Hello" + response.data.data[0]);
        // console.log('test'+student.username);
        console.log(this.username);
        console.log(response.data.data[0]);
        this.student = response.data.data[0];
        //console.log(this.student.verify_status);
        //console.log(this.student.institute_XII.length);
      })
      .catch(error => {
        console.log(error.response);
      });
  },
  methods: {
    submit() {
      console.log(this.comment);
      this.load = true;
      let formData = new FormData();
      formData.append("univ_roll_no", this.username);
      formData.append("comment", this.comment);
      formData.append("verify_status", "1");
      formData.append("_method", "POST");
      axios
        .post("/api/dashboard/queries", formData)
        .then(response => {
          console.log(response.data.data[0]);
          if (response.status == 200) {
            this.load = false;
            this.student.verify_status = 1;
            toastr["success"]("Details Verified !!");
          } else {
            this.load = false;
            toastr["success"]("Details already Verified !!");
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    },

    getAuthUser(name) {
      return this.$store.getters.getAuthUser(name);
    }
  }
};
</script>       
<style>
/* html {
  /* for demo purposes only 
  margin: 2em;
} */

.row {
  width: 100%;
}

input[type="text"],
select.form-control {
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
  color: black;
}

input[type="text"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}
button:disabled {
  cursor: not-allowed;
}
/* body
{
    margin-left: 10%;
    margin-right: 10%;
} */
input[type="text"]:disabled {
  background-color: transparent;
}

textarea {
  border: 1px solid black !important;
}

label {
  color: #5bc0de;
}
</style>

<template>

<div>
          <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Filter</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">Filter</li>
                </ol>
            </div>
          </div>
   
      <div >
       <form  method="post" v-on:submit.prevent="submit">
        <div class="main">     
 <h3>Select Required Fields</h3>
 
    <br>
    <div class="row form-check">
      <div class="col-md-12">
    <input class="form-check-input selectall" type="checkbox" id="defaultCheck1" @change="selectAll">
        <label class="form-check-label" for="defaultCheck1">
         Select All
        </label>
        </div>
        </div>
  <div class="form-check">
     <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="univ_roll_no" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          University Roll No
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="class_roll_no" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Class Roll No
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="name" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Name
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="whatsapp_cont" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Whatsapp Contact
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="dob" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          DOB
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="batch" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Batch
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="branch_type" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Branch
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="stream" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Stream
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="section" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Section
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="shift" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Shift
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="training_semester" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Training Semester
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="gender" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Gender
        </label>
      </div>
  </div>
  <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="blood_group" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Blood Group
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="category" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Category
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="weight" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Weight
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="height" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Height
        </label>
      </div>
  </div>
  
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="mother_name" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Mother Name
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="mother_phone" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Mother Contact
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="address" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Address
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="city" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          City
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="district" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          District
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="state" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          State
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="pincode" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Pincode
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="mail_id" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Mail id
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="phone_number" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Phone number
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_board" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Board
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_institue" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Institute
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_month" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Month
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_year" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Year
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_obt_marks" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Obtained Marks
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Percentage
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_percentage" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Twelfth Board
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="institute_XII" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Twelfth Institute
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="year_XII" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Twelfth Year
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="obtained_marks_XII" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Twelfth Marks
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="percentage_XII" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Twelfth Percentage
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="jee_rank_XII" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          JEE Rank
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_obt_marks" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Obtained Marks
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="board_Diploma" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Diploma Board
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="institute_Diploma" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Diploma Institute
        </label>
      </div>
  </div>
   <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="tenth_year" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Year
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="year_gap" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Year Gap
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Tenth Percentage
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="sgpa_aggregate" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Sgpa Aggregate
        </label>
      </div>
  </div>
  <div class="row">
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="percentage_aggregate" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Percentage Aggregate
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="credits_aggregate" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Credits Aggregate
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="active_backlog_aggregate" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
          Active backlog aggregate
        </label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input individual" type="checkbox" value="passive_backlog_aggregate" id="defaultCheck1" v-model="selected">
        <label class="form-check-label" for="defaultCheck1">
         Passive backlog aggregate
        </label>
      </div>
  </div>
  
 
  
  </div>
<br>
<br>
 <h3>Conditions on Required Fields</h3>
 <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="URN">University Roll No</label>
                <input type="number" class="form-control"  v-model="filter.univ_roll_no">
            </div>
        </div>
              </div>
    <!-- <br>
                    <label for="URN">University Roll No</label>
    <div class="input-group">
         <div class="form-group"> 
                <input type="number" class="form-control"
                v-validate="'required|mimes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'" 
                ref="file" name="file" id="imageUrl" @change="handleChange" >
             
             <span class="input-group-btn"> 
      <button v-on:click="import_urns()" class="btn">
            <span>Import</span>
        </button>
      </span>
      </div> -->
      <br>
  
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label for="10th">Tenth Percentage</label>
                <input type="number" step="0.01" class="form-control"  v-model="filter.TenthPercentage">
            </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="12th">Twelfth Percentage</label>
              <input type="number" class="form-control" step="0.01"  v-model="filter.TwelthPercentage">
          </div>
        </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="Diploma">Diploma Percentage</label>
                  <input type="number"
                    class="form-control"
                    step="0.01"
                    v-model="filter.DiplomaPercentage">
                </div>
              </div>
</div>
<div class="row">
              <div class="form-group col-md-4">
                <label for="CGPA">SGPA</label>
    <input type="number" min="1" max="10" step="0.01" class="form-control"
     v-model="filter.sgpa_aggregate">
    
              </div>
              <div class="form-group col-md-4">
                <label for="gap">Year gap</label>
                <input
              
                  type="number"
                  class="form-control"          
                  min="0"
                  max="3"
                  v-model="filter.year_gap"
                >
              </div>
              <div class="form-group col-md-4">
                <label for="active">Active Backlog</label>
                <input
              
                  type="number"
                  class="form-control"
                                    min="0"
                  v-model="filter.active_backlog"
                >
              </div>
</div>
<!-- <div class="row">
              <div class="form-group col-md-6">
                <label for="active">Active Backlog</label>
                <input
              
                  type="number"
                  class="form-control"
                                    min="0"
                  v-model="filter.active_backlog"
                >
              </div>
              <div class="form-group col-md-6">
                <label for="passive">Passive Backlog</label>
                <input
              
                  type="number"
                  class="form-control"
                  v-model="filter.passive_backlog"
                  min="0"
                >
              </div>
</div> -->
<div class="row">
  <div class="form-group col-md-3">
    <label for="gender">Gender</label>
  </div>
                <div class="form-group col-md-3">
                  <div class="checkbox-inline">
                    <label>
                      <input type="radio" value="MALE" v-model="filter.gender">Male
                    </label>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <div class="checkbox-inline">
                    <label>
                      <input type="radio" value="FEMALE" v-model="filter.gender">Female
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="checkbox-inline">
                    <label>
                      <input type="radio" value="MALE,FEMALE" v-model="filter.gender">Both
                    </label>
                  </div>
                </div>
 </div>
              <div class="form-group ">
                <label for="course">Select Branch:</label>
                <select 
                 multiple="multiple"
                  class="form-control "
                  v-model="filter.branch_type" >
                  <option value="COMPUTER SCIENCE AND ENGINEERING">Computer Science and Engineering</option>
                  <option value="INFORMATION TECHNOLOGY">Information Technology</option>
                  <option value="CIVIL ENGINEERING">Civil Engineering</option>
                  <option value="PRODUCATION ENGINEERING">Production Engineering</option>
                  <option value="MECHANICAL ENGINEERING">Mechanical Engineering</option>
                  <option value="ELECTRONICS AND COMMUNICATION ENGINEERING">Electronics and Communication Engineering</option>
                  <option value="ELECTRICAL ENGINEERING">Electrical Engineering</option>
                </select>
              </div>
          <br>
          <div class="form-group">
          
          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10" >
                               <span v-if="!load">Save
                      </span> 
                      <span v-else>
                        <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                      </span>
                            </button>
          </div>
        </div>
          </form>

  </div>
</div>
</template>

<script>

import SimpleVueValidation from 'simple-vue-validator';
const Validator = SimpleVueValidation.Validator;

export default {
  data() {
    return {
      load:false,
      selected:[],
      filter: {
        gender:"",
        univ_roll_no:'',
        branch_type: [],
        TenthPercentage: "",
        TwelthPercentage: "",
        year_gap: "",
        DiplomaPercentage:"",
        percentage: "",
        active_backlog: "",
        sgpa_aggregate:""
      },
    };
  },
  methods: {
          validateForm() {
	   console.log("Test validations");
         this.$validator.validateAll().then((result) => {
                    if (result) {
                      this.submit();
			          		}
					          else{
                      alert('Please enter missing details.');
                    }
                });
      },
      
      selectAll(){      
      $('.selectall').on('change', function() {     
                $('.individual').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed individual product is unchecked amd select "checked all" if all of the listed individual product is checked
        $('.individual').change(function(){ //".individual" change 
            if($('.individual:checked').length == $('.individual').length){
                   $('.selectall').prop('checked',true);
            }
            else{
                   $('.selectall').prop('checked',false);
            }
        });
      },
      
    submit() {
      console.log("test");
             this.load=true;
      var navigate = this;
      const filterData = {
        gender:this.filter.gender,
        univ_roll_no:this.filter.univ_roll_no,
        branch_type: this.filter.branch_type,
        TenthPercentage: this.filter.TenthPercentage,
        DiplomaPercentage: this.filter.DiplomaPercentage,
        TwelthPercentage: this.filter.TwelthPercentage,
        year_gap: this.filter.year_gap,
        percentage: this.filter.percentage,
        active_backlog: this.filter.active_backlog,
        sgpa_aggregate:this.filter.sgpa_aggregate
      };
      console.log(this.selected);
      let formData = new FormData();
      formData.append("univ_roll_no", filterData.univ_roll_no);      
      formData.append("branch_type", filterData.branch_type);
      formData.append("gender", filterData.gender);
      formData.append("tenth_percentage", filterData.TenthPercentage);
      formData.append("percentage_XII", filterData.TwelthPercentage);
      formData.append("year_gap", filterData.year_gap);
      formData.append("percentage_Diploma", filterData.DiplomaPercentage);
      formData.append("sgpa_aggregate", filterData.sgpa_aggregate);
      formData.append("active_backlog_aggregate", filterData.active_backlog);
      formData.append("selected_fields",this.selected);
      for (var key of formData.entries()) {
              console.log(key[0] + ', ' + key[1])
                }        
      formData.append("_method", "POST");
      
    let options = {
      responseType: 'blob',
      headers: { 'Accept': 'application/vnd.ms-excel' }

      // headers: {
      //   'Authorization': 'Bearer ' + this.$session.get('user').idToken,
      // }
    }
      axios.post('/api/dashboard/filter_students', formData, options
       )
      .then(response => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'filtered_students.xlsx');
        document.body.appendChild(link);
        link.click();
          if (response.status == 200) {
                        this.load=false;
                          toastr['success']("Data Filtered!!");
                          navigate.$router.push({
                                    path: '/home'
                                });
                        }
          }).catch(error => {
          console.log(error);
               console.log(error.response.data);

        });
      }
    }
}
</script>

<style>
.main{
  background-color: white;
  padding: 1%;
  border-radius: 1%;

}

button
{
  position: absolute;
    bottom: 0;
    right: 0;
    border: 0;
    padding: 15px 32px;
    /* color: #fff; */
    font-weight: 700;

}
.pull-right
{
  background-color: green;
  z-index: 1001;
}

h1 {
  text-align: center;
}
.small-meta {
  font-size: 12px;
}
.dim {
  opacity: 0.4;
}

.grid-wrapper {
  margin: 0 auto;
  width: 80%;
  padding: 10px;
}
input[type="number"],
select.form-control{
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}
input[type="file"]
{
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="number"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}

</style>
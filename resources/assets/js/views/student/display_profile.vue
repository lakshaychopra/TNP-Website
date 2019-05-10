
<template>
    


<div class="container">    
            <h2 class="card-title mt-3 text-primary">Profile Details</h2>
    <hr class="style3">
    <div class="form-group">
 <fieldset disabled="">
  <div class="row">
    <div class="col-md-5">
      <input type="text" class="form-control" v-model="student.name">
      <label for="id_username"  > Name </label>
    </div>
     <div class="col-md-2">
      <input type="text" class="form-control" v-model="student.dob">
       <label for="id_username"   > DOB </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="student.category">
      <label for="id_username"   > Category </label>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" v-model="student.whatsapp_cont">
      <label for="id_username"   > Whatsapp Contact </label>
    </div>
</div>

     <div class="row">
   <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.gender">
      <label for="id_username"   > Gender </label>
    </div>
    <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.height">
       <label for="id_username"   > Height </label>
    </div>
     <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.weight">
      <label for="id_username"  > Weight </label>
    </div>
    <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.blood_group" >
      <label for="id_username"   > Blood Group</label>
    </div>
  </div>

  <h2 class="card-title mt-3 text-primary">College Details</h2>
   <hr class="style3">
    <div class="row">
    <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.univ_roll_no">
      <label for="id_username"   > University Roll No </label>
    </div>
    <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.class_roll_no" >
       <label for="id_username"  > Class Roll No </label>
    </div>
    <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.batch" >
       <label for="id_username"   > Batch</label>
    </div>
     <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.living" >
       <label for="id_username"   > Hostler/Day Scholar</label>
    </div>
  </div>
   <div class="row">
    
    <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.stream" >
       <label for="id_username"   >Stream </label>
    </div>
    <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.shift" >
       <label for="id_username"  > Shift </label>
    </div>
    <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.training_semester">
       <label for="id_username"  > Training Semester </label>
    </div>
     <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="student.section" >
      <label for="id_username"  > Section </label>
    </div>
  </div>


  <h2 class="card-title mt-3 text-primary">Personal & Address Details</h2>
   <hr class="style3">
  <div class="row">
    <div class="col-md-6">
         
      <input type="text" class="form-control" v-model="student.father_name">
       <label for="id_username"  > Father Name </label>
    </div>
    <div class="col-md-6">
          
      <input type="text" class="form-control" v-model="student.father_phone" >
      <label for="id_username"  > Father Contact </label>
    </div>
    
  </div>
  
  <div class="row">
    <div class="col-md-6">
         
      <input type="text" class="form-control" v-model="student.mother_name">
       <label for="id_username"  > Mother Name </label>
    </div>
    <div class="col-md-6">
         
      <input type="text" class="form-control" v-model="student.mother_phone" >
       <label for="id_username"  > Mother Contact </label>
    </div>
     
  </div>
  <div class="row">
    <div class="col-md-8">
         
      <input type="text" class="form-control" v-model="student.address" >
       <label for="id_username"  > Address</label>
    </div>
    <div class="col-md-4">
         
      <input type="text" class="form-control" v-model="student.pincode">
       <label for="id_username"  > Pincode</label>
    </div>
     
  </div>
   <h2 class="card-title mt-3 text-primary">10th Details</h2>
    <hr class="style3">
   <div class="row">
       <div class="col-md-8">
          
      <input type="text" class="form-control" v-model="student.tenth_institue">
      <label for="id_username"  > Institute Name </label>
    </div>
    <div class="col-md-4">
          
      <input type="text" class="form-control" v-model="student.tenth_board">
      <label for="id_username"  > Board </label>
    </div>
   </div>
   <div class="row">
    <div class="col-md-4">
          
      <input type="text" class="form-control" v-model="student.tenth_percentage">
      <label for="id_username"  > CGPA/Percentage</label>
    </div>
    <div class="col-md-6">
         
      <input type="text" class="form-control" v-model="student.tenth_year">
       <label for="id_username"  >  Year of Passing</label>
    </div>
  </div>
    <h2 class="card-title mt-3 text-primary">12th/Diploma Details</h2>
     <hr class="style3">
     <div class="row">
       <div class="col-md-8">
          
      <input type="text" class="form-control" v-model="student.pre_edu_institue">
      <label for="id_username"> Institute Name </label>
    </div>
    <div class="col-md-4">
          
      <input type="text" class="form-control" v-model="student.pre_edu_board">
      <label for="id_username"> Board </label>
    </div>
   </div>
   <div class="row">
    <div class="col-md-4">
          
      <input type="text" class="form-control" v-model="student.pre_edu_percentage">
      <label for="id_username"> CGPA/Percentage</label>
    </div>
    <div class="col-md-5">
         
      <input type="text" class="form-control" v-model="student.pre_edu_year">
       <label for="id_username"  > Year of Passing</label>
    </div>
     <div class="col-md-3">
         
      <input type="text" class="form-control" v-model="student.year_gap">
       <label for="id_username"  > Year Gap</label>
    </div>
  </div>
  <h2 class="card-title mt-3 text-primary">Semester-1 </h2>
   <hr class="style3">
  <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[0]">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[0]" >
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[0]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[0]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[0]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[0]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>

   <h2 class="card-title mt-3 text-primary">Semester-2</h2>
    <hr class="style3">
  <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[1]" >
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[1]">
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[1]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[1]" >
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[1]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[1]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
   <h2 class="card-title mt-3 text-primary">Semester-3</h2>
    <hr class="style3">
    <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[2]">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[2]">
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[2]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[2]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[2]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[2]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
   <h2 class="card-title mt-3 text-primary">Semester-4</h2>
    <hr class="style3">
   <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[3]">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[3]">
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[3]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[3]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[3]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[3]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
   <h2 class="card-title mt-3 text-primary">Semester-5</h2>
    <hr class="style3">
    <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[4]" >
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[4]" >
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[4]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[4]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[4]" >
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[4]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
<!--
   <h2 class="card-title mt-3 text-primary">Semester-6</h2>
    <hr class="style3">
  <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[5]" >
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[5]">
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[5]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[5]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[5]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[5]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
   <h2 class="card-title mt-3 text-primary">Semester-7 </h2>
    <hr class="style3">
    <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[6]">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[6]">
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[6]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[6]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[6]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[6]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
  
     <h2 class="card-title mt-3 text-primary">Semester-8 </h2>
    <hr class="style3">
   <div class="row">
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_obt_marks[7]">
      <label for="id_username"  > Obtained Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_max_marks[7]">
      <label for="id_username"  > Max Marks</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_credits[7]">
      <label for="id_username"  > Credits </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_percent[7]">
      <label for="id_username"  > Percentage </label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_active_backlog[7]">
       <label for="id_username"  > Active Backlog</label>
    </div>
    <div class="col-md-2">
      <input type="text" class="form-control" v-model="this.sem_passive_backlog[7]">
       <label for="id_username"  > Passive Backlog </label>
    </div>
</div>
  -->
<h2 class="card-title mt-3 text-primary">Aggregate</h2>
    <hr class="style3">
  <div class="row">
    <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="this.aggregate_percentage">
      <label for="id_username" > Percentage</label>
    </div>
    <div class="col-md-3">
          
      <input type="text" class="form-control" v-model="this.aggregate_cgpa">
      <label for="id_username" > CGPA</label>
    </div>
   
  </div>
  </fieldset>
  </div>
    
</div>
</template>     
<script>
  import {
    storeStudentURL,
    formstepChangeURL,
    firstLoginviewStudentProfileURL,
    viewStudentProfileURL
    } from "../../config.js";
    import {
    fetchProfileURL
  } from "../../config.js";
    export default {
        data() {
            return {
                userid: this.$store.state.auth.userid,
                student: {},
                sem_obt_marks:[],
                sem_max_marks:[],
                sem_credits:[],
                sem_active_backlog:[],
                sem_passive_backlog:[],
                sem_percent:[],
                aggregate_percentage:0,
                aggreagate_cgpa:0,
                profile: {
                    'univ_roll_no': this.$parent.username,
                },
                monthYear: '',
                month: '',
                year: '',
                form_step: {
                   student_form_step: "DEGREE",
                   id: this.$parent.id
                }
            }
        },
        created() {
            axios.get('/api/dashboard/student/profile/' + this.$parent.username + '/edit').then(response => {
                console.log('Hello'+response.data.data[0]);

                this.student = response.data.data[0];
                console.log(this.student );
                var i;
                 for( i=1;i<=this.$parent.sem_limit;i++){
                this.sem_obt_marks[i-1] = this.splitarray(this.student.sem_obt_marks, i);
                this.sem_max_marks[i-1] = this.splitarray(this.student.sem_max_marks, i);
                this.sem_credits[i-1] = this.splitarray(this.student.sem_credits, i);
                this.sem_active_backlog[i-1] = this.splitarray(this.student.sem_active_backlog, i);
                this.sem_passive_backlog[i-1] = this.splitarray(this.student.sem_passive_backlog, i);
                this.sem_percent[i-1] = this.splitarray(this.student.sem_percent, i);
                 }

                  var i , sum=0, product=0, sum_credits = 0, sum_active = 0, sum_passive=0, sum_max = 0;
              
                    for(i =0;i<this.$parent.sem_limit;i++){
                        product = parseInt(this.sem_obt_marks[i]) * parseInt(this.sem_credits[i]);
                        console.log(product);
                        sum = sum + product;   
                         sum_credits = sum_credits + parseInt(this.sem_credits);
                    }
                        this.aggregate_cgpa = (sum / sum_credits ) ;
                        this.aggregate_percentage=(sum / sum_credits ) * 9.5 ;
                        consle.log(this.aggregate_percentage);

                    


              }).catch(error => {
                console.log(error.response);
              });
               // console.log(this.id.student);

              
                },
        methods: {
            splitarray(arr, index) {
                return arr.split('-')[index - 1];
            },
      
          getAuthUser(name) {
             return this.$store.getters.getAuthUser(name);
          }
        }
    }
        
</script>       
<style>
    /* html {
  /* for demo purposes only 
  margin: 2em;
} */

input[type="text"],
select.form-control{
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="text"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}
/* body
{
    margin-left: 10%;
    margin-right: 10%;
} */
input[type="text"]:disabled{background-color:transparent;}

</style>
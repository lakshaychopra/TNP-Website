<template>
<div class="body">
  <br>
  <br>
    <!-- <h1><b>You have been registered for {{company}}</b></h1> -->
    <h1><b>Thank you for registering, your response is recorded.</b></h1>
    <!-- <h3>Your domain is {{company}}</h3> -->
    <br>
    <!-- <br>
    <form-group>
        <div class="form">
        <h5>Preview Data</h5>
        <hr>
          <label for="id_username"   > University Roll No: </label>
         <input type="text" class="form-control" :value="urn" disabled><br>
         <label for="id_username"   > Class Roll No:</label>
         <input type="text" class="form-control" :value="crn" disabled><br>
         <label for="id_username"   > Branch:</label>
         <input type="text" class="form-control" :value="branch" disabled><br>
          <label for="id_username"   > Company:</label>
         <input type="text" class="form-control" :value="company" disabled><br>
                  <input type="text" class="form-control" :value="submit" disabled><br>

        </div>
        <button type="submit" class="btn btn-success btn-block card-footer" on-click="edit">
              <span v-if="!load">Edit</span> 
              <span v-else>
                <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
              </span>
        </button> 
        <button type="submit" class="btn btn-success btn-block card-footer" on-click="submit">
              <span v-if="!load">Submit</span> 
              <span v-else>
                <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
              </span>
          </button>
    </form-group> -->
</div>        
</template>
<script>
export default {
    name: 'Preview',
    props: ['urn','crn','branch','company','submit'],
    load:false,
//     methods:{
//         edit(){
//            this.submit=false;
//         },
//         submit(){
//                 let formData = new FormData();
//                 formData.append('univ_roll_no', this.univ_roll_no);
//                 formData.append('class_roll_no', this.class_roll_no);
//                 formData.append('name', this.name);
//                 formData.append('branch', this.branch);
//                 formData.append('company_name', this.company_name);
//                 formData.append('_method', 'POST');
//                     console.log('hi');    
//                     for (var key of formData.entries()) {
// 			        console.log(key[0] + ', ' + key[1])
// 		            }           
//                     axios.post('api/company_registration', formData)
//                     .then(response=>{
//                     console.log(response.data.data[0]);
//                        if (response.status == 200) {
//                         //  this.submitted=true;
//                          this.load=false;
//                           toastr['success']("Student registered!!");
//                         }
//                     }) 
//                             .catch(function (err) {
//                                 console.log(err);
//                             });
     
// }
   // }
}
</script>
<style>
.body
{
   background-color:lightblue;
    /* width: 100%;
    height: 100%; */
    /* background-attachment: fixed; */
}
.form
{
    background-color: lightblue;
    
}
</style>

<template>
<div class=body>
    <div class="container h-100">
      <div v-if="this.submitted">
        <preview :urn="univ_roll_no" :crn="class_roll_no" :branch="branch" :company="company_name" :submit="submitted"></preview>
      </div>
      <div v-else>
        <div class="d-flex justify-content-center">
        <div class="card mt-5 col-md-6 animated bounceInDown myForm">
        <span>
          <h1>{{company_name}} REGISTRATION FORM</h1>
        </span>
        <div class="card-body">
        <form method="post" @submit.prevent="validateForm">
        <div id="dynamic_container">
		    <div class="form-group" :class="{error: validation.hasError('univ_roll_no')}">
            <label> University Roll no</label>
            <div class="content"><input v-validate="'required|numeric|length:7'" placeholder="Enter University Roll No" type="text" class="form-control" v-model="univ_roll_no"/></div>
            <div class="message">{{ validation.firstError('univ_roll_no') }}</div>
        </div>
        <div class="form-group" :class="{error: validation.hasError('repeat')}">
            <label >Re-enter University Roll no</label>
            <div class="content"><input v-validate="'required|numeric|length:7'" placeholder="Re-enter University Roll No" type="password" class="form-control" v-model="repeat"/></div>
            <div class="message">{{ validation.firstError('repeat') }}</div>
        </div>
        <div>
            <label for="id_username"  >Class Roll no</label>
            <input type="numeric"  placeholder="Enter Class Roll No" class="form-control " v-validate="'required|numeric|length:7'" v-model="class_roll_no">
        </div>
        <br>
        <div>
          
          <label> Name</label>
          <input type="text"  placeholder="Enter Name" class="form-control" v-model="name">
        </div>
        <br>
        <div>
          <label> Company</label>
          <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="company_name">
            <option value="" disabled selected>Choose Company</option>
            <option v-for="company in companies" v-bind:value="company.company_name" :key="company.company_name">
                {{ company.company_name }}
            </option>
          </select></div>
        <br>

        <label> Branch</label>
        <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="branch">
            <option value="" disabled selected>Choose branch</option>
            <option value="B.Tech Computer Science And Engineering">B.Tech Computer Science And Engineering</option>
            <option value="B.Tech Electronics And Communication Engineering">B.Tech Electronics And Communication Engineering</option>
            <option value="B.Tech Information Technology">B.Tech Information Technology</option>
            <option value="B.Tech Civil Engineering">B.Tech Civil Engineering</option>
            <option value="B.Tech Electrical Engineering">B.Tech Electrical Engineering</option>
            <option value="B.Tech Mechanical Engineering">B.Tech Mechanical Engineering</option>
            <option value="B.Tech Production Engineering">B.Tech Production Engineering </option>
            <option value="M.Tech Production Engineering">M.Tech Production Engineering </option>
            <option value="M.Tech Industrial Engineering">M.Tech Industrial Engineering </option>
            <option value="M.Tech Power Engineering">M.Tech Power Engineering </option>
            <option value="M.Tech Structural Engineering ">M.Tech Structural Engineering </option>
            <option value="M.Tech Computer Science And Engineering">M.Tech Computer Science And Engineering </option>
            <option value="M.Tech Geo-Technical Engineering">M.Tech Geo-Technical Engineering </option>
            <option value="M.Tech Environmental Science And Engineering">M.Tech Environmental Science And Engineering </option>
            <option value="M.Tech Electronics And Communication Engineering">M.Tech Electronics And Communication Engineering </option>
            <option value="M.Tech Electrical Engineering">M.Tech Electrical Engineering </option>
            <option value="M.Tech Soil Mechanics And Foundation Engineering">M.Tech Soil Mechanics And Foundation Engineering </option>
            <option value="MBA">MBA </option>
            <option value="MCA">MCA </option>
        </select>
      
        </div>
        
        <br>
				  <button type="submit" class="btn btn-success btn-block card-footer">
              <span v-if="!load">Verify</span> 
              <span v-else>
                <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
              </span>
          </button>
	    </form>
	  </div>
    </div>
    </div>
  </div>
  </div>
  </div>
</template>
<script>
import SimpleVueValidation from 'simple-vue-validator';
import Preview from "../../views/registration/preview.vue";
const Validator = SimpleVueValidation.Validator;


export default {
data(){
  return{
        repeat: '',
        submitted: false,
        name: '',
        company_name:'',
        univ_roll_no:'',
        class_roll_no:'',
        branch:'',
        load:false,
        companies: [],
        //companies:{"select1":"Select 1","select2":"Select 2","select3":"Select 3"}
  }
},
created() {
            axios.get('/api/add_company').then(response => {
                console.log('Hello' + response.data.data[0]);
                console.log(response.data.data);
                this.companies = response.data.data;                
                console.log(arr);
                }).catch(error => {
                console.log(error.response);
              })
},
components:{
        Preview
    },
validators: {
      univ_roll_no: function (value) {
        return Validator.value(value).required().minLength(6);
      },
      'repeat, univ_roll_no': function (repeat, univ_roll_no) {
        if (this.submitted || this.validation.isTouched('repeat')) {
          return Validator.value(repeat).required().match(univ_roll_no);
        }
      }
  },
   methods: {
      validateForm() {
	   console.log("Test validations");
         this.$validator.validateAll().then((result) => {
                    if (result) {
                      this.preview();
			          		}
					          else{
                      alert('Please enter missing details.');
                    }
                });
      },
      preview(){
        var txt;
        var s="Verify Details !!";
        var s2="\nUniversity Roll No:"+this.univ_roll_no+"\nClass Roll No:"+
        this.class_roll_no+"\nName:"+this.name+"\nBranch:"+this.branch+"\nCompany:"+this.company_name;
        if(confirm(s+s2)){
          this.submit();

        }
        else{
          
        }
      },
     submit() {
		 console.log("hello");
             this.load=true;
             this.submitted=true;
               let formData = new FormData();
                formData.append('univ_roll_no', this.univ_roll_no);
                formData.append('class_roll_no', this.class_roll_no);
                formData.append('name', this.name);
                formData.append('branch', this.branch);
                formData.append('company_name', this.company_name);
                formData.append('_method', 'POST');
                    console.log('hi');    
                    for (var key of formData.entries()) {
			        console.log(key[0] + ', ' + key[1])
		            }           
                    axios.post('api/company_registration', formData)
                    .then(response=>{
                    console.log(response.data.data[0]);
                       if (response.status == 200) {
                        //  this.submitted=true;
                         this.load=false;
                          toastr['success']("Student registered!!");
                        }
                    }) 
                            .catch(function (err) {
                                console.log(err);
                            });
            },
        
   
  
  'repeat, univ_roll_no': function (repeat, univ_roll_no) {
  if (this.submitted || this.validation.isTouched('repeat')) {
    return Validator.value(repeat).required().match(univ_roll_no);
  }
}
   }
}
</script>
<style>
label{
  color: black;
}
.body{
background-color:whitesmoke;
}
 .card
{
  margin-top:20%;
  position: sticky;
}
.myForm{
    background-color:powderblue!important;
    padding: 15px !important;
  border-radius: 15px !important;
  color: black;
  position: relative; 
}
  input:focus{
    outline: none;
    box-shadow:none !important;
  }

  .br-15{
    border-radius: 15px 0 0 15px !important;
  }  
  .btn{
    border-radius: 15px !important;
    background-color:midnightblue !important;
    border: 0 !important;
  }
input[type="text,password"]
select.form-control{
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="text,password"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}
input[type="text,password"]:disabled{background-color:transparent;}
h1
{
  font-family: 'Times New Roman', Times, serif;
  color: rgb(8, 8, 12);
  text-align: center;
  font-weight: bold;
  
}
</style>



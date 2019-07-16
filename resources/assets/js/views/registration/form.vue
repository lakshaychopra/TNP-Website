<template>
    <div class="container h-100">
      <div v-if="this.submitted">
        <preview :urn="univ_roll_no" :crn="class_roll_no" :branch="branch" :company="company_name"></preview>
      </div>
      <div v-else>
        <div class="d-flex justify-content-center">
        <span>
          <h4>{{company_name}} Registration form</h4>
        </span>
        <div class="card mt-5 col-md-4 animated bounceInDown myForm">
          <div class="card-header">
            <h4>Student Details</h4>
          </div>
        <div class="card-body">
        <form method="post" @submit.prevent="storePost">
        <div id="dynamic_container">
		    <div class="form-group" v-validate="'required'" :class="{error: validation.hasError('univ_roll_no')}">
            <div class="content"><input type="text" class="form-control" v-model="univ_roll_no"/></div>
            <div class="message">{{ validation.firstError('univ_roll_no') }}</div>
            <label for="id_username"  > University Roll no</label>
        </div>
        <div class="form-group" v-validate="'required'" :class="{error: validation.hasError('repeat')}">
            <div class="content"><input type="password" class="form-control" v-model="repeat"/></div>
            <div class="message">{{ validation.firstError('repeat') }}</div>
            <label for="id_username"  >Again University Roll no</label>
        </div>
        <div>
            <input type="text" class="form-control" v-model="class_roll_no">
            <label for="id_username"  >Class Roll no</label>
        </div>
        <div>
          <input type="text" class="form-control" v-model="name">
          <label for="id_username"  > Name</label>
        </div>
          <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="branch">
            <option value="" disabled selected>  Choose your branch</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="IT">IT</option>
            <option value="Civil">Civil</option>
            <option value="Electrical">Electrical</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Production">Production</option>
          </select>
        </div>
        <div class="row">
          <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="company_name">
            <option value="" disabled selected>Choose company</option>
            <option value="TCS">TCS</option>
            <option value="Accenture">Accenture</option>
            <option value="Infoyses">Infoyses</option>
          </select>
        </div>
        <div class="row">
				  <button type="submit" class="btn btn-primary btn-lg" >
					    <span v-if="!load">Submit</span> 
              <span v-else>
                  <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
              </span>
				  </button>
        </div>
	    </form>
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
  }
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
                      this.storePost();
			          		}
					          else{
                      alert('Please enter missing details.');
                    }
                });
      },
     storePost() {
		 console.log("hello");
		         this.load=true;
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
                         this.submitted=true;
                         this.load=false;
                          toastr['success']("User Added!!");
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
 .myForm{
    background-color: grey !important;
    padding: 15px !important;
   border-radius: 15px !important;
   color: white;
   
   }

   /* input{
    /* border-radius:0 15px 15px 0 !important; */

   input:focus{
       outline: none;
       box-shadow:none !important;
    /* border:1px solid #ccc !important; */

   }

   .br-15{
    border-radius: 15px 0 0 15px !important;
   }

   #add_more{
    color: white !important;
    background-color: #fa8231 !important;
    border-radius: 15px !important;
    border: 0 !important;

   }
   #remove_more{
    color: white !important;
    background-color: #fc5c65 !important;
    border-radius: 15px !important;
    border: 0 !important;
    display: none;

   }
    
   .submit_btn{
    border-radius: 15px !important;
    background-color: #95c714 !important;
    border: 0 !important;
   }



   /*try*/
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
/* body
{
    margin-left: 10%;
    margin-right: 10%;
} */
input[type="text,password"]:disabled{background-color:transparent;}
</style>



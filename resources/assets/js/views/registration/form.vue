<template>
    <div class="container h-100">
	<div class="d-flex justify-content-center">
      <span><h4>Registration form:{{message}}</h4></span>
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
			
				<h4>Students Contact Details</h4>
			</div>
			<div class="card-body">
				<form method="post" @submit.prevent="validateForm">
					<div id="dynamic_container">
    
<div class="form-group" v-validate="'required'" :class="{error: validation.hasError('password')}">
      
      <div class="content"><input type="password" class="form-control" v-model="password"/></div>
      <div class="message">{{ validation.firstError('password') }}</div>
	  <label for="id_username"  > University Roll no</label>
    </div>
    <div class="form-group" v-validate="'required'" :class="{error: validation.hasError('repeat')}">
      
      <div class="content"><input type="password" class="form-control" v-model="repeat"/></div>
      <div class="message">{{ validation.firstError('repeat') }}</div>
	   <label for="id_username"  > University Roll no</label>
    </div>

	
	
<div>
      <input type="text" class="form-control">
      <label for="id_username"  >Class Roll no</label>
    </div>

	<div>
      <input type="text" class="form-control">
      <label for="id_username"  > Name</label>
    </div>
	

						
    

						<div class="input-group mt-3">
							
						
						</div>
					</div>
					



 <select class="mdb-select colorful-select dropdown-primary md-form form-control">
      <option value="" disabled selected>  Choose your branch</option>
      <option value="">CSE</option>
      <option value="">ECE</option>
      <option value="">IT</option>
	  <option value="">Civil</option>
	  <option value="">Electrical</option>
	  <option value="">Mechanical</option>
	  <option value="">Production</option>
	  

    </select>


				</form>
			</div>
			
            <div class="row">
  

    <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="message">
      <option value="" disabled selected>Choose company</option>
      <option value="TCS">TCS</option>
      <option value="Accenture">Accenture</option>
      <option value="Infoyses">Infoyses</option>

    </select>

 
</div>



			<div class="card-footer">
				<!-- <a class="btn btn-secondary btn-sm" id="add_more"><i class="fas fa-plus-circle"></i> Add</a>
				<a class="btn btn-secondary btn-sm" id="remove_more"><i class="fas fa-trash-alt"></i> Remove</a> -->
				<div class="actions">
				<button type="button" class="btn btn-success float-right" on-click="submit">Submit</button>
			</div>
			</div>
		</div>
	</div>
	</div>
</template>
<script>
import SimpleVueValidation from 'simple-vue-validator';

const Validator = SimpleVueValidation.Validator;

export default {
data(){
	return{
	 message:' ',
	 password: '',
        repeat: '',
        submitted: false
	}
},
validators: {
      password: function (value) {
        return Validator.value(value).required().minLength(6);
      },
      'repeat, password': function (repeat, password) {
        if (this.submitted || this.validation.isTouched('repeat')) {
          return Validator.value(repeat).required().match(password);
        }
      }
	},
	 methods: {
      submit: function () {
        this.submitted = true;
        this.$validate()
          .then(function(success) {
            if (success) {
              alert('Validation succeeded!');
			}
		  });
		  },
	
created(){
$(document).ready(function() {
$('.mdb-select').materialSelect();
});


        	var i=0;
	$(document).ready(function(){
     $('#add_more').on('click', function(){
      var colorR = Math.floor((Math.random() * 256));
      var colorG = Math.floor((Math.random() * 256));
      var colorB = Math.floor((Math.random() * 256));
      i++;
      var html ='<div id="append_no_'+i+'" class="animated bounceInLeft">'+
          '<div class="input-group mt-3">'+
		  '<div class="input-group-prepend">'+
		  '<span class="input-group-text br-15" style="color:rgb('+colorR+','+colorG+','+colorB+'">'+
		  '<i class="fas fa-user-graduate"></i></span>'+
		  '</div>'+
		  '<input type="text" placeholder="Student Name"  class="form-control"/>'+
		  '</div>'+
		  '<div class="input-group mt-3">'+
		  '<div class="input-group-prepend">'+
		  '<span class="input-group-text br-15" style="color:rgb('+colorR+','+colorG+','+colorB+'">'+
		  '<i class="fas fa-phone-square"></i></span>'+
		  '</div>'+
		  '<input type="text" placeholder="Student Phone" class="form-control"/>'+
		  '</div>'+
		  '<div class="input-group mt-3">'+
		  '<div class="input-group-prepend">'+
		  '<span class="input-group-text br-15" style="color:rgb('+colorR+','+colorG+','+colorB+'">'+
		  '<i class="fas fa-at"></i></span>'+
		  '</div>'+
		  '<input type="email" placeholder="Student Email" class="form-control"/>'+
		  '</div></div>';

	  $('#dynamic_container').append(html);
	  $('#remove_more').fadeIn(function(){
	  	 $(this).show();
	  });
     });

     $('#remove_more').on('click', function(){
         
         $('#append_no_'+i).removeClass('bounceInLeft').addClass('bounceOutRight')
            .fadeOut(function(){
            	$(this).remove();
            });
            i--;
            if(i==0){
            	$('#remove_more').fadeOut(function(){
            		$(this).hide()
            	});;
            }
   
     });
	});
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
	submit(){
		this.submitted = true;
		

	},
	'repeat, password': function (repeat, password) {
  if (this.submitted || this.validation.isTouched('repeat')) {
    return Validator.value(repeat).required().match(password);
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


<template>
    <div class="container h-100">
	<div class="d-flex justify-content-center">
      <span><h4>Registration form:{{message}}</h4></span>
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
			
				<h4>Students Contact Details</h4>
			</div>
			<div class="card-body">
				<form>
					<div id="dynamic_container">
						 <label>
    <p class="label-txt">ENTER YOUR EMAIL</p>
    <input type="text" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<input type="text" v-validate="'required'" placeholder="University Roll no" class="form-control"/>
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div>
							<input type="text" v-validate="'required|confirmed:password'"  class="form-control"
							placeholder="University Roll no, Again" data-vv-as="password"/>
						</div>

						<!-- ERRORS -->
    <div class="alert alert-danger" v-show="errors.any()">
      <div v-if="errors.has('password')">
        {{ errors.first('password') }}
      </div>
      <div v-if="errors.has('password_confirmation')">
        {{ errors.first('password_confirmation') }}
      </div>
    </div>

						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-at"></i></span>
							</div>
							<input type="email" placeholder="Student Name" class="form-control"/>
						</div>
					</div>
					<select class="mdb-select colorful-select dropdown-primary md-form" >
      <option value="" disabled selected>Choose your branch</option>
      <option>CSE</option>
      <option>ECE</option>
      <option>IT</option>
	  <option>Civil</option>
	  <option>Mechanical</option>
	  <option>Production</option>
	  <option>Electrical</option>
     
    </select>

				</form>
			</div>
            <div class="row">
  

    <select class="mdb-select colorful-select dropdown-primary md-form" v-model="message">
      <option value="" disabled selected>Choose company</option>
      <option value="TCS">TCS</option>
      <option value="Accenture">Accenture</option>
      <option value="Infoyses">Infoyses</option>
     
    </select>

 
</div>
			<div class="card-footer">
				<!-- <a class="btn btn-secondary btn-sm" id="add_more"><i class="fas fa-plus-circle"></i> Add</a>
				<a class="btn btn-secondary btn-sm" id="remove_more"><i class="fas fa-trash-alt"></i> Remove</a> -->
				<button class="btn btn-success btn-sm float-right submit_btn"><i class="fas fa-arrow-alt-circle-right"></i> Submit</button>
			</div>
		</div>
	</div>
	</div>
</template>
<script>

export default {
data(){
	return{
	 message:' ',
	}
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
    }
}
</script>
<style>
 .myForm{
   	background-color: rgba(0,0,0,0.5) !important;
   	padding: 15px !important;
   border-radius: 15px !important;
   color: white;
   
   }

   input{
   	/* border-radius:0 15px 15px 0 !important; */

   }
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
   .line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #8BC34A;
  transition: ease .6s;
}
.label-txt {
  position: absolute;

  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}
</style>


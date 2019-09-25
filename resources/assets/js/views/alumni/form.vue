<template>

    <div class="container">    
        <!-- Just an image -->
      <div class="fixed-top">
        <nav class="navbar navbar-expand-xl bg-dark navbar-dark">
            <!-- Brand -->
            <router-link to="/" class="navbar-brand d-none d-md-block">
                <img src="/logo.png" alt="logo" height="55px" width="55px"> <strong>Training & Placement Cell</strong>
            </router-link>
            <router-link to="/" class="navbar-brand d-md-none">
                <img src="/logo.png" alt="logo" height="55px" width="55px">
            </router-link>
            <div class="navbar-header">
            </div>
        </nav>
        <form action="/" method="GET" v-on:submit.prevent v-if="search_input" class="d-xl-none">
            <div class="col-md-12 BGWhite">
                <div class="row px-3 py-2">
                    <input class="form-control" type="text" v-model="search" @keyup="searchPost" autocomplete="on"
                        placeholder="Search" id="search-med">
                </div>
            </div>
        </form>
       </div>
    <br>
    <br>
    <br>
        <h2 class="card-title mt-3 text-primary" style="margin-top: 25px">Alumni Assistance Form</h2> 
               <form @submit.prevent="submit" method="post">
    <div class="form-group">
  <div class="row">
    <div class="col-md-5">
      <input type="text"  v-validate="'required'" class="form-control" v-model="name">
      <label> Name </label>
    </div>
     <div class="col-md-4">
      <input type="text"  v-validate="'required'" class="form-control" v-model="email">
      <label> Email </label>
    </div>
     <div class="col-md-3">
      <input type="text" v-validate="'required'" class="form-control" v-model="phone_number">
      <label> Phone Number </label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <input type="text" v-validate="'required'" class="form-control" v-model="whatsapp_cont">
      <label> Whatsapp Contact </label>
    </div>
     <div class="col-md-3"> 
      <input type="text" v-validate="'required'" class="form-control" v-model="pass_year">
      <label> Passing out year </label>
    </div>
</div>
  <div class="row">
    <div class="col-md-6">
      <input type="text" class="form-control" v-model="current_org">
       <label> Current Organisation </label>
    </div>
    <div class="col-md-6">
      <input type="text" v-validate="'required'" class="form-control" v-model="current_pos">
      <label> Current Position </label>
    </div>
  </div>
  <br>
    <div class="form-group ">
                <label for="course">Select Branch</label>
                <select class="form-control branch" id="course" name="branch_type" v-validate="'required'" v-model="branch_type">
                  <option>Computer Science & Engineering</option>
                  <option>Information Technology</option>
                  <option>Civil Engineering</option>
                  <option>Production Engineering</option>
                  <option>Mechanical Engineering</option>
                  <option>Electronics & Communication Engineering</option>
                  <option>Electrical Engineering</option>
                  <option>Mtech</option>
                  <option>MBA</option>
                  <option>MCA</option>
                </select>
              </div>
  </div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Would you want to help the College, Juniors and the Placement Team ?
            <span class="input-required text-danger">*</span></label>
           <div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios" v-model="form_display" value="yes">
  <label class="custom-control-label" for="defaultUnchecked">  
    Yes
      </label>
</div>

<!-- Default checked -->
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" v-model="form_display" value="no">
  <label class="custom-control-label" for="defaultChecked">No</label>
</div>      
            <small class="text-danger">{{ errors.first('category') }}</small>
        </div>
    </div>
</div>

<div v-if="this.form_display=='yes'">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
         
                <input v-validate="'required'" class="form-control" type="text" 
                        autofocus maxlength="50" v-model="job_title">
                <small class="text-danger">{{ errors.first('title') }}</small>
                <label for="">Title<span class="input-required text-danger">*</span></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <input v-validate="'required'" class="form-control" type="text" 
                        autofocus maxlength="50" v-model="job_des">
                <small class="text-danger">{{ errors.first('Description') }}</small>
                <label for="">Job Description<span class="input-required text-danger">*</span></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <label for="">Eligible Branches<span class="input-required text-danger">*</span></label>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" v-validate="'required'" value="Computer Science & Engineering" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">Computer Science & Engineering</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="Electrical Engineering" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">Electrical Engineering</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="Civivl Engineering" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">Civil Engineering</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="Electronics & Communication Engineering" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">Electronics & Communication Engineering</label>
    </div>
<div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="Mechanical Engineering" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">Mechanical Engineering</label>
    </div>


    </div>
    <div class="col-md-6">
    
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="Production Engineering" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">Production Engineering</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="MTECH" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">MTECH</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="MBA" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">MBA</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" v-validate="'required'" type="checkbox" value="MCA" id="defaultCheck1" v-model="branchies">
        <label class="form-check-label" for="defaultCheck1">MCA</label>
    </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
           
                <input v-validate="'required'" class="form-control" type="text" value=""
                        autofocus maxlength="50" v-model="job_loc">
            <small class="text-danger">{{ errors.first('location') }}</small>
             <label for="">Job Location<span class="input-required text-danger">*</span></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            
                    <input v-validate="'required'" class="form-control" type="text" 
                        autofocus maxlength="50" v-model="salary">
            <small class="text-danger">{{ errors.first('salary') }}</small>
            <label for="">Salary<span class="input-required text-danger">*</span></label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
          
                    <input v-validate="'required'" class="form-control" type="text" 
                        autofocus maxlength="50" v-model="vacancy">
            <small class="text-danger">{{ errors.first('vacancy') }}</small>
              <label for="">No. of vacancies<span class="input-required text-danger">*</span></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Category</label>
                <select class="form-control" v-validate="'required'" name="category" v-model="category">
                    <option value="Internship">Internship</option>
                    <option value="Placement">Placement</option>
                    <option value="Announcement">Announcement</option>
                </select>
            <small class="text-danger">{{ errors.first('category') }}</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Post link</label>
            <input class="form-control" type="text"  v-model="post_link" autofocus>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Technical Requirements<span class="input-required text-danger">*</span></label>
                <input v-validate="'required'" class="form-control" type="text" 
                        autofocus maxlength="50" v-model="tech_req">
            <small class="text-danger">{{ errors.first('title') }}</small>
        </div>
    </div>
</div>
</div>
    <button type="submit" class="btn btn-info waves-effect waves-light m-t-10"> 
        <span>Submit</span>
    </button>
    </form>  
</div> 
</template>     
      

<script>
export default {
        data() {
            return {
                    name: '',
                    branch_type: '',
                    email: '',
                    phone_number: '',
                    whatsapp_cont: '',
                    salary: '',
                    vacancy: '',
                    job_title: '',
                    post_link: '',
                    job_des: '',
                    tech_req: '',
                    category:'',
                    form_display:'no',
                    job_loc:'',
                    current_pos:'',
                    current_org:'',
                    pass_year:'',
                    branchies:[],
                    load:false
            };
        },
        methods:{
            submit() {
                var navigate = this;
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('category',this.category);
                formData.append('category',this.category);
                formData.append('email', this.email);
                formData.append('pass_year', this.pass_year);
                formData.append('branch_type', this.branch_type);
                formData.append('phone_number',this.phone_number);
                formData.append('whatsapp_cont',this.whatsapp_cont);
                formData.append('job_loc',this.job_loc);
                formData.append('job_des',this.job_des);
                formData.append('current_org',this.current_org);
                formData.append('current_pos',this.current_pos);
                formData.append('tech_req',this.tech_req);
                formData.append('vacancy',this.vacancy);
                formData.append('branchies',this.branchies);
                formData.append('job_title',this.job_title);
                formData.append('post_link',this.post_link);
                formData.append('_method', 'POST');
                axios.post('/api/alumni', formData)
                    .then(response=>{
                       if (response.status == 200) {
                         toastr['success']("Information Added!!");
                          navigate.$router.push({
                                    path: '/'
                                });
                        }
                      }) 
                    .catch(function (err) {
                        console.log(err);
                    });
                
            }
        }
            
}
</script>
<style>

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
input[type="text"]:disabled{background-color:transparent;}

 .bg-dark {
        background-color: #038ed4 !important;
    }
</style>

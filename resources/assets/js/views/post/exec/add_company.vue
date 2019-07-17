<template>
   <form @submit.prevent="validate" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label >Company Name<span class="input-required text-danger">*</span></label>
                    <input v-validate="'required'" class="form-control" type="text" value="" v-model="company_name" name="title"
                        autofocus maxlength="50">
                    <small class="text-danger">{{ errors.first('title') }}</small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
            <span>Submit</span>
        </button>
    </form>
</template>
<script>
export default {
    data(){
  return{
        company_name:'',
        load:false,
  }
},
    methods:{
         validate() {
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
             var navigate = this;
             this.load=true;
                let formData = new FormData();
                formData.append('company_name', this.company_name);
                formData.append('_method', 'POST');  
                console.log(this.company_name);  
                    axios.post('/api/dashboard/add_company', formData)
                    .then(response=>{
                    console.log(response.data.data[0]);
                       if (response.status == 200) {
                         this.load=false;
                          toastr['success']("Company Added!!");
                          navigate.$router.push({
                                    path: '/home'
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

<template>
<div>
    <!-- <div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-secondary" v-on:click="action('add')">Add</button>
] <button type="button" class="btn btn-secondary" v-on:click="action('delete')">Delete</button>
</div> -->
   <form @submit.prevent="validate" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label >Add New Company<span class="input-required text-danger">*</span></label>
                    <input v-validate="'required'" class="form-control" type="text" value="" v-model="company_name2" name="title"
                        autofocus maxlength="50">
                    <small class="text-danger">{{ errors.first('title') }}</small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
            <i class="fa fa-address-book-o fa-fw"></i>Add
        </button>
        </form>
     <br>
     <hr>
     <br>
   <form @submit.prevent="deletion">
            <label >Delete Company<span class="input-required text-danger">*</span></label>
                    <select class="mdb-select colorful-select dropdown-primary form-control" 
                        v-validate="'required'" v-model="company_name">
            <option value="" disabled selected>Choose Company</option>
            <option v-for="company in companies" v-bind:value="company.company_name" :key="company.company_name">
                {{ company.company_name }}
            </option>
          </select>
               <br>
                <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
                    <i class="fa fa-trash fa-fw"></i>
                     Delete
                </button>
               
      
    </form>
     </div> 
</template>
<script>
export default {
    data(){
  return{
        company_name2:'',
        load:false,
        companies: [],
        company_name:''

  }
},
created() {
            axios.get('/api/add_company').then(response => {
                this.companies = response.data.data;                
                }).catch(error => {
                console.log(error.response);
              });
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
                formData.append('company_name', this.company_name2);
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
        },
        deletion(){
            console.log(this.company_name);
            var navigate = this;
            this.load=true;
                axios.delete('/api/dashboard/delete/'+this.company_name).then(response => {
                if (response.status == 200) {
                         this.load=false;
                        toastr['success'](response.data.message);
                          navigate.$router.push({
                                    path: '/home'
                                });
                        }
                      })                 
                      .catch(error => {
                });
        }
    }
}
</script>
<style scoped>
i {
  display: inline-block;
  margin-right: 1em;
}

</style>

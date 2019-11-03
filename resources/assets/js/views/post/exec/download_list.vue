<template>
<div>
       <form @submit.prevent="submit" method="post">
     <h2>Students List</h2>
        <div class="row">
            <div class="col-md-12">
                    <label>Select Company Name<span class="input-required text-danger">*</span></label>
                    <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="company_name">
            <option value="" disabled selected>Choose Company</option>
            <option v-for="company in companies" v-bind:value="company.company_name" :key="company.company_name">
                {{ company.company_name }}
            </option>
          </select>
            </div>
        </div>
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
            <span>Download</span>
        </button>
        
<br>
</form>
<br>
<br>
<form @submit.prevent="count" method="post">
        <div class="row">
            <div class="col-md-8">
                    <label>Company's Count</label>
                    <select class="mdb-select colorful-select dropdown-primary md-form form-control" v-model="company_name">
            <option value="" disabled selected>Choose Company</option>
            <option v-for="company in companies" v-bind:value="company.company_name" :key="company.company_name">
                {{ company.company_name }}
            </option>
          </select>
            </div>
            <div class="col-md-4">
             <div class="form-group">
              <label for="count">Count</label>
                <input type="number" class="form-control"  v-model="count_students" value="this.count_students">
            </div>
               </div>
        </div>
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
            <span>Get Count</span>
        </button>
        
<br>
</form>
</div>
</template>
<script>
export default {
    data(){
  return{
        companies: [],
        company_name:'',
        count_students:0,
        load:false
  }
},
created() {
            axios.get('/api/company_name').then(response => {
                console.log(response.data.data);
                this.companies = response.data.data;                
                }).catch(error => {
                console.log(error.response);
              });
},
methods:{
 submit(){
            let formData = new FormData();
            formData.append('company_name', this.company_name); 
            formData.append('_method', 'POST'); 
            let options = {
      responseType: 'blob',
      headers: { 'Accept': 'application/vnd.ms-excel' }
    }  
     axios.post('/api/dashboard/company_list', formData, options).then(response=>{
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'students_list.xlsx');
        document.body.appendChild(link);
        link.click();

                       if (response.status == 200) {
                          toastr['success']("List Downloaded!!");
                          this.$router.push({
                                    path: '/home'
                                });
                        }
                    }) 
                            .catch(function (err) {
                                console.log(err);
                            });

 },
 count(){
          let formData = new FormData();
            formData.append('company_name', this.company_name); 
            formData.append('_method', 'POST');
               axios.post('/api/dashboard/company_count', formData)
                    .then(response=>{
                       if (response.status == 200) {
                         this.count_students=response.data;
                         this.load=false;
                        }
                      }) 
                    .catch(function (err) {
                        console.log(err);
                    });
 }
}
}
</script>
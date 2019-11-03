<template>
<div>
    <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Post</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">Alumni Post</li>
                </ol>
            </div>
        </div>
        <div class="row">
        <table class="table table-bordered table-striped mb-0 css-serial">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
    </tr>
  </thead>
  <tbody>
     <tr scope="row" v-for="student in students" v-bind:value="student" :key="student">
                                <td> {{  }} </td>
                                <td> {{ student.name }} </td>
                                <td> {{ student.mail_id }} </td>
                                <td> {{ student.phone_number }} </td>
    </tr>
  </tbody>
</table>

        </div>
</div>
</template>
<script>
export default {
data() {
    return {
           students:[],
    };
  },
  created(){
    axios.get('/api/display_student').then(response => {
                this.students = response.data.data; 
                console.log(students);
                }).catch(error => {
                console.log(error.response);
              });
  }
  
}
</script>
<style scoped>
.my-custom-scrollbar {
position: relative;
height: 200px;
overflow: auto;
}
.tablex{
    margin: 50px;
}
.thead{
    position: -webkit-sticky;
  position: sticky;
  top: 0;
}
.table-wrapper-scroll-y {
display: block;
}
.css-serial {
 counter-reset: serial-number; /* Set the serial number counter to 0 */
}
.css-serial td:first-child:before {
 counter-increment: serial-number; /* Increment the serial number counter */
 content: counter(serial-number); /* Display the counter */
}
</style>
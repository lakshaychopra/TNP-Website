<template>
<div>
    <br>
    <h3>Our Prominent Alumnis</h3>
    <br>
    <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar tablex">

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
     <tr scope="row" v-for="alumni in alumnis" v-bind:value="alumni" :key="alumni">
                                <td> {{  }} </td>
                                <td> {{ alumni.name }} </td>
                                <td> {{ alumni.email }} </td>
                                <td> {{ alumni.phone_number }} </td>
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
           alumnis:[],
    };
  },
  created(){
    axios.get('/api/alumni_posts').then(response => {
                this.alumnis = response.data.data; 
                //console.log(alumnis);
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

<template>
    <table class="table">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Title</th>
        <!-- <th>Edit</th> -->
      </tr>
    </thead>
    <tbody>
      <tr v-for="ab in about" :key="ab.id">
        <td>{{ sno }}</td>
        <td>{{ab.title}}</td>
        <td><i class="fa fa-edit mr-3"></i>
        <i class="fa fa-trash"></i></td>
      </tr>
    </tbody>
  </table>  
</template>
<script>
export default {
    data(){
        return{
            sno:1,
            about:{},
            page: 1,
        }
    },
    created(){
        this.getPages();
    },
    methods:{
        getrecord(record) {
                this.about = record.data.data.data;
        },
        getPages(){
            const vm = this;
            axios.get('/api/dashboard/about?page=' + vm.page)
                        .then(function (response) {
                            vm.about = response.data.data.data;
                            // console.log(response.data.data.data);
                            // if (response.data.data.data.length == 0) {
                            //     vm.busy = true;
                            // } else {
                            //     vm.busy = false;
                            // }
                            // for (var i = 0; i < response.data.data.data.length; i++) {
                            //     console.log(response.data.data.data[i]);
                            //     this.about =response.data.data.data[i];
                            // }
                            // this.getrecord(response);
                            // console.log(vm.about);
                            // vm.loading = 0;
                            // vm.page = vm.page + 1;

                        })
                        .catch((error) => console.log(error));
        }
    }
}
</script>
<style scoped>

</style>

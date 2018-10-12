<template>
    <div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Pages</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link to="/home">Home</router-link>
                    </li>
                    <li class="breadcrumb-item active">Page</li>
                </ol>
            </div>
        </div>

        <h4 class="card-title mb-4">Pages List</h4>
        <!-- <h6 class="card-subtitle" v-if="tasks.total">Total {{tasks.total}} result found!</h6> -->
        <!-- <h6 class="card-subtitle" v-else>No result found!</h6> -->
        <table class="table table-responsive table-bordered table-hover" style="background:#ffffff">
            <thead class='thead-light text-center'>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Title</th>
                    <th scope="col" style="width:180px;">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="ab in about" :key="ab.id">
                    <td scope="row">{{ sno }}</td>
                    <td>{{ab.title}}</td>
                    <td>
                        <button class="btn btn-info btn-sm" @click.prevent="" data-toggle="tooltip" title="Edit Task">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click.prevent="" data-toggle="tooltip" title="Delete task">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- <div class="row">
            <div class="col-md-8">
                <pagination :data="tasks" :limit=3 v-on:pagination-change-page="getTasks"></pagination>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <select name="pageLength" class="form-control" v-model="filterTaskForm.pageLength" @change="getTasks"
                        v-if="tasks.total">
                        <option value="5">5 per page</option>
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="100">100 per page</option>
                    </select>
                </div>
            </div>
        </div> -->
    </div>
</template>
<script>
    export default {
        data() {
            return {
                about: {},
                sno: 0,
                page: 1,
            }
        },
        created() {
            this.getPages();
        },
        methods: {
            getrecord(record) {
                this.about = record.data.data.data;
            },
            getPages() {
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
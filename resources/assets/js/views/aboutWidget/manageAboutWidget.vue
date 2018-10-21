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
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="ab in about" :key="ab.id">
                    <td scope="row">{{++sno}}</td>
                    <td>{{ab.title}}</td>
                    <td>
                        <button class="btn btn-info btn-sm" @click.prevent="editPages(ab)" data-toggle="tooltip" title="Edit Task">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                about: {},
                sno:0,
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
                axios.get('/api/dashboard/about/widget?page=' + vm.page)
                    .then(function (response) {
                        vm.about = response.data.data.data;
                    })
                    .catch((error) => console.log(error));
            },
            editPages(ab){
                this.$router.push('/about/widget/'+ab.id+'/edit');
            },
        }
    }
</script>
<style scoped>

</style>
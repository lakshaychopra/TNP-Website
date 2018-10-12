<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="filter">
                        <h4 class="mb-1"> Filter By</h4>
                    </div>
                    <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" @click="searchby_category('All')">All</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" @click="searchby_category('Placement')">Placement</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" @click="searchby_category('Announcement')">Announcement</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" @click="searchby_category('Internship')">Internship</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="filter">
                        <h4 class="mb-1"> Explore</h4>
                    </div>
                    <div class="card-body" v-for="pg in page" :key="pg.id" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <router-link v-bind:to="'/page/'+pg.url">{{ pg.title }}</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="downloads">
                        <h4 class="mb-1"> Downloads</h4>
                    </div>
                    <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="../../files/Evaluation.pdf" download="Evaluation.pdf">Evaluation Performa</a>
                            </li>
                            <li class="list-group-item">
                                <a href="../../files/Training.pdf" download="Training.pdf">6 Month Training Form</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="link">
                        <h4 class="mb-1"> Useful Links</h4>
                    </div>
                    <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="https://gndec.ac.in/" target="_blank" rel="noopener">GNDEC</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.indiabix.com/" target="_blank" rel="noopener">IndiaBIX</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.naukri.com/" target="_blank" rel="noopener">Naukri.com</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.indeed.co.in/" target="_blank" rel="noopener">Indeed</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://internshala.com" target="_blank" rel="noopener">Internshala</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {
        categoryURL,
        pageLinkWidget
    } from "../../config.js";
    export default {
        data() {
            return {
                page: {},
            }
        },
         created() {
            axios.get(pageLinkWidget)
                .then((response) => {
                    this.page = response.data.data.data;
                })
                .catch((error) => console.log(error))
        },
        methods: {
            searchby_category(category) {
                if (category != "All") {
                    axios.get(categoryURL + category)
                        .then(response => this.$parent.posts = response.data.data.data, this.$parent.pinned_posts =
                            undefined)
                } else {
                    this.$parent.getPosts();
                    this.$parent.getPinnedPosts();
                }
            }
        }
    }
</script>
<style scoped>
</style>
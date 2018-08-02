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
        categoryURL
    } from "../../config.js";
    export default {
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
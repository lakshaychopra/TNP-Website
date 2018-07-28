<template>
    <div class="sticky-top fix">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="filter">
                        <h4 class="mb-1"> Filter By</h4>
                    </div>
                    <div class="card-body">
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
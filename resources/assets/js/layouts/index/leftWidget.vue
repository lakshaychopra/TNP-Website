<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header" id="about">
                        <h4 class="mb-1"> Alumni</h4>
                    </div> -->
                    <div class="card-body py-1" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="https://api.whatsapp.com/send?phone=919915794339"
                                    target="_blank" rel="noopener">Connect with the TPO</a>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/alumni_form">Alumni Assistance Form</router-link>
                            </li>
                            <li class="list-group-item">
                                <a href="https://forms.gle/SqfAoAbCB71sRgnt8" target="_blank" rel="noopener">Survey on Future Planning</a>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/placement-brochure">Placement Brochure</router-link>
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
                        <h4 class="mb-1"> Explore</h4>
                    </div>
                    <div class="card-body py-1" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <router-link to="/page/words-from-tpo">Words from TPO</router-link>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/invitation">Invitation</router-link>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/about-training-and-placement-cell">About Training and Placement
                                    Cell</router-link>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/genconian">Genconians</router-link>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/final-year-members">Final Year Members</router-link>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/executive-members">Executive Members</router-link>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/page/placement-record">Placement Record</router-link>
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
                    <div class="card-body py-1" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="../../files/PlacementBroucher.pdf" download="PlacementBroucher.pdf">Placement
                                    Brochure</a>
                            </li>
                            <li class="list-group-item">
                                <a href="../../files/Evaluation.pdf" download="Evaluation.pdf">Evaluation Performa</a>
                            </li>
                            <li class="list-group-item">
                                <router-link to="/training-form">6 Months Training Form</router-link>
                            </li>
                            <li class="list-group-item">
                                <a href="../../files/6WeeksTraining.pdf" download="Training.pdf">6 Weeks Training Form</a>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href='//www.microsoft.com/store/apps/9npc7f14c558?ocid=badge' target="_blank" rel="noopener">
                        <img src='/images/ms-download.png' alt='Download badge for windows store' width='100%' />
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="javascript:void(0)">
                        <img src='/images/pwa-download.png' id="pwaPrompt" v-on:click="installed" alt='Download badge for pwa'
                            width='100%' />
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="filter">
                        <h4 class="mb-1"> Filter By</h4>
                    </div>
                    <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="javascript:void(0)" @click="searchby_category('All')">All</a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0)" @click="searchby_category('Placement')">Placement</a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0)" @click="searchby_category('Announcement')">Announcement</a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0)" @click="searchby_category('Internship')">Internship</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>
<script>
    export default {
        methods: {
            installed(event) {
                // if (window.matchMedia('(display-mode: standalone)').matches) {
                alert('Already installed!!')
                // }
                // else{
                //     this.an();
                // }
            }
        }
    }
    // import {
    // categoryURL,
    //     pageLinkWidget
    // } from "../../config.js";
    // export default {
    // data() {
    // return {
    // page: {},
    // }
    // },
    // created() {
    // axios.get(pageLinkWidget)
    //     .then((response) => {
    //         this.page = response.data.data;
    //     })
    //     .catch((error) => console.log(error))
    // },
    // methods: {
    // searchby_category(category) {
    //     if (category != "All") {
    //         axios.get(categoryURL + category)
    //             .then(response => this.$parent.posts = response.data.data.data, this.$parent.pinned_posts =
    //                 undefined)
    //     } else {
    //         this.$parent.getPosts();
    //         this.$parent.getPinnedPosts();
    //     }
    // }
    // }
    // }
</script>
<style scoped>

</style>

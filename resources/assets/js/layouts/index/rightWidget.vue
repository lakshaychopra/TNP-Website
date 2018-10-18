<template>
    <div class="col-md-3 px-1 d-none d-lg-block " id="sidebar">
        <div class="row">
            <div class="col-md-12">
                <div class="card" v-for="off in office" :key="off.id">
                    <div class="card-header" id="office">
                        <h4>{{ off.office_widget }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="office text-center">
                            <img v-bind:src="'/images/' + off.office_picture" width="75%" v-if="off.office_picture != null"
                                v-bind:alt="off.office_widget" style="margin-bottom: 15px;">
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-10">
                                <p class="mb-0">
                                    <strong>{{ off.office_name }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-10">
                                <small>{{ off.office_position}}</small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <i class="fa fa-envelope mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a :href="'mailto:'+off.office_email" target="_blank">{{ off.office_email }}</a>
                                </small>
                            </div>
                        </div>
                        <div class="row mt-1">

                            <div class="col-md-2">
                                <i class="fa fa-phone mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a :href="'tel:'+off.office_phone" target="_blank">{{ off.office_phone }}</a>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row align-self-start sticky-top" style="top:75px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="about">
                        <h4> ABOUT</h4>
                    </div>
                    <div class="card-map">
                        <a href="https://goo.gl/maps/222WTpFjiqE2" rel="noopener" target="_blank" role="button" tabindex="0">
                            <img class="img" alt="map" aria-label="Map attachment" src="/images/map.png" width="100%"
                                height="100">
                        </a>
                    </div>
                    <div class="card-body" style="padding-top:20px;">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-compass mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>{{ about.about_address }}
                                    <br> {{ about.about_location }}
                                    <br>
                                    <a href="https://goo.gl/maps/B61b8nR1svs" target="_blank" rel="noopener"><strong>&#8625;</strong>&nbsp;
                                        Get Directions</a>
                                </small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <i class="fa fa-phone mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a :href="'tel:'+about.about_phone" target="_blank">{{ about.about_phone }}</a>
                                </small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <i class="fa fa-envelope mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a :href="'mailto:'+about.about_email" target="_blank">{{ about.about_email }}</a>
                                </small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <i class="fa fa-globe mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a href="https://gndec.ac.in/" target="_blank" rel="noopener">{{
                                        about.about_website }}</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {
        officeWidget,
        aboutWidget
    } from '../../config';
    export default {
        data() {
            return {
                office: {},
                about: {},
            }
        },
        created() {
            axios.get(officeWidget)
                .then((response) => {
                    this.office = response.data.data;
                })
                .catch((error) => console.log(error))
            axios.get(aboutWidget)
                .then((response) => {
                    this.about = response.data.data[0];
                })
                .catch((error) => console.log(error))
        }

    }
</script>
<style scoped>
</style>
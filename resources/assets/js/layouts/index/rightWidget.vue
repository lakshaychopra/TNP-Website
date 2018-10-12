<template>
    <div class="col-md-3 px-1 d-none d-lg-block " id="sidebar">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="office">
                        <h4>T&P OFFICE</h4>
                    </div>

                    <div class="card-body">
                        <div class="office text-center">
                            <img src="/images/sodhi.jpg" width="75%" alt="Prof. G.S. Sodhi" style="margin-bottom: 15px;">
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-10">
                                <p class="mb-0">
                                    <strong>{{ office.office_name }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-10">
                                <small>{{ office.office_position}}</small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <i class="fa fa-envelope mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a :href="'mailto:'+office.office_email" target="_blank">{{ office.office_email }}</a>
                                </small>
                            </div>
                        </div>
                        <div class="row mt-1">

                            <div class="col-md-2">
                                <i class="fa fa-phone mt-1" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                <small>
                                    <a :href="'tel:'+office.office_phone" target="_blank">{{ office.office_phone }}</a>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row align-self-start sticky-top" style="top:75px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="about">
                        <h4> ABOUT</h4>
                    </div>
                    <div class="card-map">
                        <a href="https://wego.here.com/directions/mix/mylocation/e-eyJuYW1lIjoiR25kZWMtIFRyYWluaW5nIGFuZCBQbGFjZW1lbnQiLCJhZGRyZXNzIjoiR3VydSBOYW5hayBEZXYgRW5naW5lZXJpbmcgQ29sbGVnZSBHaWxsIFBhcmsgTHVkaGlhbmEgMTQxMDA2LCBMdWRoaWFuYSwgUHVuamFiLCBJbmRpYSAxNDEwMDYiLCJsYXRpdHVkZSI6MzAuODU5MzM3NTA3ODAzLCJsb25naXR1ZGUiOjc1Ljg2MTY3Mjk3MzYzMywicHJvdmlkZXJOYW1lIjoiZmFjZWJvb2siLCJwcm92aWRlcklkIjoyODg1Nzc3NzExOTM4ODB9?map=30.859337507803,75.861672973633,15,normal&fb_locale=en_GB"
                            rel="noopener" target="_blank" role="button" class="" tabindex="0">
                            <div class="_4j7v _5bld">
                                <img class="_a3f img" alt="map" aria-label="Map attachment" src="https://external.fluh1-1.fna.fbcdn.net/static_map.php?region=IN&amp;v=42&amp;osm_provider=2&amp;size=306x98&amp;zoom=15&amp;markers=30.85933751%2C75.86167297&amp;language=en_GB"
                                    width="100%" height="98">
                            </div>
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
        </div> -->
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
                    this.office = response.data.data[0];
                })
                .catch((error) => console.log(error))

            // axios.get(aboutWidget)
            //     .then((response) => {
            //         this.about = response.data.data[0];
            //     })
            //     .catch((error) => console.log(error))
        }

    }
</script>
<style scoped>
</style>
<template>
    <div>
        <tnc v-if="step == 1"></tnc>
        <profile-form v-else-if="step == 2"></profile-form>
        <matrics-form v-else-if="step == 3"></matrics-form>
        <previous-education v-else-if="step == 4"></previous-education>
    </div>
</template>
<script>
    import Tnc from './tnc.vue'
    import ProfileForm from './profileForm.vue'
    import MatricsForm from './matricsForm.vue'
    import PreviousEducation from './previousEducation.vue'
    import helper from './../../services/helper'

    export default {
        data() {
            return {
                step: null,
                id:'',
                username:'',
            }
        },
        components: {
            Tnc,
            ProfileForm,
            MatricsForm,
            PreviousEducation
        },
        methods: {
            getAuthUser(name) {
                return this.$store.getters.getAuthUser(name);
            },
        },

        created() {
            return helper.authUser().then(res => {
               this.id = res.id;
               this.username = res.username;
                if (res.type == "STUDENT") {
                    switch (res.student_form_step) {
                        case "N.A.":
                            this.step = 1;
                            break;
                        case "TC":
                            this.step = 2;
                            break;
                        case "PROFILE":
                            this.step = 3;
                            break;
                        case "METRICS_EDUCATION":
                            this.step = 4;
                            break;
                        case "PREVIOUS_EDUCATION":
                            this.step = 5;
                            break;
                        case "DEGREE":
                            this.step = 6;
                            break;
                        default:

                            break;
                    }
                }
            })

        },
        updated() {
            return helper.authUser().then(res => {
                if (res.type == "STUDENT") {
                    switch (res.student_form_step) {
                        case "N.A.":
                            this.step = 1;
                            break;
                        case "TC":
                            this.step = 2;
                            break;
                        case "PROFILE":
                            this.step = 3;
                            break;
                        case "METRICS_EDUCATION":
                            this.step = 4;
                            break;
                        case "PREVIOUS_EDUCATION":
                            this.step = 5;
                            break;
                        case "DEGREE":
                            this.step = 6;
                            break;
                        default:
                            break;
                    }
                }
            })
        }
    }
</script>
<style scoped>

</style>
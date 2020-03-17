<template>
    <div>
        <tnc v-if="step == 1"></tnc>
        <email v-else-if="step == 2"></email>
        <profile-form v-else-if="step == 3"></profile-form>
        
        <matrics-form v-else-if="step == 4"></matrics-form>
        <previous-education v-else-if="step == 5"></previous-education>
        <graduation v-else-if="step == 6"> </graduation>
        <display-profile v-else-if="step == 7"></display-profile>
        <!-- <degree-education v-else-if="step == 6"></degree-education> -->
        <!-- <aggregate-education v-else-if="step == 6"></aggregate-education> -->
    </div>
</template>
<script>
    import Tnc from './tnc.vue'
    import ProfileForm from './profileForm.vue'
    import MatricsForm from './matricsForm.vue'
    import PreviousEducation from './previousEducation.vue'
    import email from './email.vue'
    // import AggregateEducation from './aggregate.vue'
    import Graduation from './graduation.vue'
    import DisplayProfile from './display_profile.vue'
    import helper from './../../services/helper'

    export default {
        data() {
            return {
                step: null,
                id:'',
                name:'',
                sem_limit:''
            }
        },
        components: {
            Tnc,
            ProfileForm,
            MatricsForm,
            PreviousEducation,
            email,
            //AggregateEducation
            DisplayProfile,
            Graduation
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
                console.log(res.sem_limit);
                this.sem_limit = res.sem_limit;
                if (res.type == "STUDENT") {
                    switch (res.student_form_step) {
                        case "N.A.":
                            this.step = 1;
                            break;
                        case "TC":
                            this.step = 3;
                            break;
                       case "Email":
                            this.step = 2;
                            break;
                        case "PROFILE":
                            this.step = 4;
                            break;
                        case "METRICS_EDUCATION":
                            this.step = 5;
                            break;
                        case "PREVIOUS_EDUCATION":
                            this.step = 6;
                            break;
                        case "GRADUATION":
                            this.step = 7;
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
                            this.step = 3;
                            break;
                        case "Email":
                            this.step = 2;
                            break;
                        case "PROFILE":
                            this.step = 4;
                            break;
                        case "METRICS_EDUCATION":
                            this.step = 5;
                            break;
                        case "PREVIOUS_EDUCATION":
                            this.step = 6;
                            break;
                        case "GRADUATION":
                            this.step = 7;
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

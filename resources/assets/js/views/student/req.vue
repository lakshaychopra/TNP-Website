<template>
	<div>
        <tnc v-if="step == 1"></tnc>
        <profile-form v-else-if="step == 2"></profile-form>
        <education-form v-else-if="step == 3"></education-form>
    </div>    
</template>
<script>
    import Tnc from './tnc.vue'
    import ProfileForm from './profileForm.vue'
    import EducationForm from './acadaemicsForm.vue'
    import helper from './../../services/helper'

export default {
    data(){
        return{
            step:null,
        }
    },
    components: {
            Tnc, ProfileForm, EducationForm
    },
    methods:{
         getAuthUser(name){
                return this.$store.getters.getAuthUser(name);
        },
    },
    created(){
        return helper.authUser().then(res => {
                        if (res.type == "STUDENT" ) {
                            switch (res.student_form_step) {
                                case "N.A.":
                                    this.step = 1;
                                    break;
                                case "TC":
                                    this.step =2;
                                default:
                                    
                                    break;
                            }
                        }
                    })
      
    },
    updated(){
                return helper.authUser().then(res => {
                        if (res.type == "STUDENT" ) {
                            switch (res.student_form_step) {
                                case "N.A.":
                                    this.step = 1;
                                    break;
                                case "TC":
                                    this.step =2;
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

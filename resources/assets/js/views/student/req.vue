<template>
  <div>
    <tnc v-if="step == 1"></tnc>
    <email-form v-else-if="step == 2"></email-form>
    <profile-form v-else-if="step == 3"></profile-form>
    <matrics-form v-else-if="step == 4"></matrics-form>
    <previous-education v-else-if="step == 5"></previous-education>
    <display-profile v-else-if="step == 6"></display-profile>
  </div>
</template>
<script>
import Tnc from "./tnc.vue";
import emailForm from "./email.vue";
import ProfileForm from "./profileForm.vue";
import MatricsForm from "./matricsForm.vue";
import PreviousEducation from "./previousEducation.vue";
import DisplayProfile from "./display_profile.vue";
import helper from "./../../services/helper";

export default {
  data() {
    return {
      step: null,
      id: "",
      name: "",
      sem_limit: ""
    };
  },
  components: {
    Tnc,
    emailForm,
    ProfileForm,
    MatricsForm,
    PreviousEducation,
    DisplayProfile
  },
  methods: {
    getAuthUser(name) {
      return this.$store.getters.getAuthUser(name);
    },
    titleCase(string) {
      return string.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      });
    }
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
          case "Email":
            this.step = 2;
            break;
          case "TC":
            this.step = 3;
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
          default:
            break;
        }
      }
    });
  },
  updated() {
    return helper.authUser().then(res => {
      if (res.type == "STUDENT") {
        switch (res.student_form_step) {
          case "N.A.":
            this.step = 1;
            break;
          case "Email":
            this.step = 2;
            break;
          case "TC":
            this.step = 3;
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
          default:
            break;
        }
      }
    });
  }
};
</script>
<style scoped>
</style>
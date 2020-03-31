<template>
  <div class="bg">
    <div class="row">
      <div class="card-body">
        <center>
          <h2>Email Verification</h2>
        </center>
        <br />
        <div class="center">
          <form method="post" @submit.prevent="emai">
            <div class="d-flex center-content-center mt-5 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text lab">Email</span>
                </div>
                <input type="email" name="email" id="email" class="form-control" v-model="mail_id" />
              </div>
            </div>
            <div class="form-group">
              <center>
                <button
                  type="submit"
                  value="Submit"
                  id="sendotp"
                  class="btn btn-info btn-lg"
                >Send OTP</button>
              </center>
            </div>
          </form>
          <form method="post" @submit.prevent="veri" v-show="enterOTP">
            <div class="d-flex center-content-center mt-5 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text lab">Enter OTP</span>
                </div>
                <input
                  type="number"
                  name="confirmail"
                  id="confirmail"
                  class="form-control"
                  v-model="OTP"
                />
              </div>
            </div>
            <div class="form-group">
              <center>
                <button type="submit" value="Submit" class="btn btn-info btn-lg">Submit</button>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { formstepChangeURL, verifyEmail } from "../../config.js";

export default {
  data() {
    return {
      OTP: "",
      confirmail: "",
      id: this.$parent.id,
      mail_id: "",
      enterOTP: false,
      profile: {
        univ_roll_no: this.$parent.username
      },
      form_step: {
        student_form_step: "TC",

        id: this.$parent.id
      }
    };
  },
  methods: {
    getAuthUser(name) {
      return this.$store.getters.getAuthUser(name);
    },
    veri() {
      if (this.OTP == this.confirmail) {
        alert("Verified");
        axios.post(formstepChangeURL, this.form_step).then(stat => {
          if (stat.status == 200) {
            this.$parent.step = 3;
          }
        });
      } else {
        alert("Invalid OTP");
      }
    },
    emai() {
      console.log(this.mail_id);
      let formData = new FormData();
      formData.append("mail", this.mail_id);
      formData.append("id", this.id);
      axios
        .post("api/dashboard/user/email_verify", formData)
        .then(response => {
          if (response.status == 200) {
            let data = response.data.data;
            this.confirmail = data.OTP;
            console.log('Testing OTP :' + this.confirmail);
            this.enterOTP = true;
            $("#sendotp").attr("disabled", true);
          }
        })
        .catch(function(err) {
          console.log(err);
        });
    }
  }
};
</script>
<style scoped>
.center {
  margin: auto;
  width: 60%;
}
.bg {
  background-color: white;
}
</style>

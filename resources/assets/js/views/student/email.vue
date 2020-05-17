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
                <input type="email" name="email" id="email" class="form-control" v-model="mail_id" required>
              </div>
            </div>
            <div class="form-group">
              <center>
                <button type="submit" value="Submit" id="sendotp" class="btn btn-info btn-lg">
                  <span v-if="!load">Send OTP</span>
                  <span v-else>
                    <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                  </span>
                </button>
              </center>
            </div>
          </form>
          <form method="post" @submit.prevent="veri" v-show="enterOTP" id="otpform">
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
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      id="gucci"
      style="display:none;"
      data-target="#pass"
    >
      Change
      Password
    </button>
    <div id="pass" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title">Change Password</h1>
          </div>
          <form @submit.prevent="valid">
            <div class="modal-body">
              <div class="input-group">
                <label for="new" class="col-6 mt-2 mb-2">New Password</label>
                <input
                  type="password"
                  name="new"
                  id="new"
                  class="col-6 mt-2 mb-2"
                  required
                  v-model="passwordForm.new_password"
                />
              </div>
              <div class="input-group">
                <label for="renew" class="col-6 mt-2 mb-2">Re-enter New Password</label>
                <input
                  type="password"
                  name="renew"
                  id="renew"
                  class="col-6 mt-2 mb-2"
                  required
                  v-model="passwordForm.new_password_confirmation"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" id="change" class="btn btn-danger">Change Password</button>
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
      passwordForm: new Form({
        id: this.$store.state.auth.userid,
        new_password: "",
        new_password_confirmation: ""
      }),
      load: false,
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
    valid() {
      if (
        this.passwordForm.new_password_confirmation == "" ||
        this.passwordForm.new_password == "" 
      ) {
        toastr["error"]("Please Fill all values");
        return;
      } else if (this.passwordForm.new_password.length < 8) {
        toastr["error"]("Passwords cannot be shorter than 8 characters");
        return;
      } else if (
        this.passwordForm.new_password !=
        this.passwordForm.new_password_confirmation
      ) {
        toastr["error"]("Passwords don't match");
        return;
      }
      this.submit();
    },
    submit() {
      axios
        .post("api/dashboard/user/change-password", this.passwordForm)
        .then(response => {
          console.log(response);
          toastr["success"](response.data.message);
          this.passwordForm.new_password = "";
          this.passwordForm.new_password_confirmation = "";
          $('#pass').modal('hide');
          axios.post(formstepChangeURL, this.form_step).then(stat => {
            if (stat.status == 200) {
              this.$parent.step = 3;
            }
          });
        })
        .catch(response => {
          toastr["error"](response.message);
        });
    },
    getAuthUser(name) {
      return this.$store.getters.getAuthUser(name);
    },
    veri() {
      if (this.OTP == this.confirmail) {
        toastr["success"]("Verified !!");
        $("#otpform").hide();
        $('#pass').modal({backdrop: 'static', keyboard: false})  
      } else {
        toastr["error"]("Invalid OTP!!");
      }
    },
    emai() {
      this.load = true;
      console.log(this.mail_id);
      let formData = new FormData();
      formData.append("mail", this.mail_id);
      formData.append("id", this.id);
      axios
        .post("api/dashboard/user/email_verify", formData)
        .then(response => {
          if (response.status == 200) {
            toastr["success"]("OTP Sent !!");
            let data = response.data.data;
            this.confirmail = data.OTP;
            console.log("Testing OTP :" + this.confirmail);
            this.enterOTP = true;
            this.load = false;
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

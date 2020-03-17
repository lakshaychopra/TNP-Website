<template>
  <div class="bg">
    <form method="post" @submit="submit">
      <div class="row">
        <div class="card-body">
          <center>
            <h2>Email Verification</h2>
          </center>
          <br />
          <div class="center">
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
                <button type="submit" value="Submit" class="btn btn-info btn-lg">Submit</button>
              </center>
            </div>
          </div>
        </div>
      </div>
      
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mail_id: "",
      statusChange: {
          'student_form_step': "",
          'id': this.$parent.id,
      }
    };
  },
  methods: {
    submit() {
      console.log(this.mail_id);
      let data = {'mail':this.mail_id};
      axios
        .post("api/email_verify", data)
        .then(response => {
          console.log(response.data.data[0]);
          if (response.status == 200) {
            //  this.submitted=true;
            this.load = false;
            // toastr['success']("Email Verified!!");
            navigate.$router.push({
              path: "/"
            });
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

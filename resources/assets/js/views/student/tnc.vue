<template>
  <div>
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center text-themecolor m-b-0 m-t-0">Terms and Conditions</h3>

            <form method="post" @submit.prevent="nextStep">
              <div class="row">
                <div class="col-lg-12 mx-auto">
                  <ol>
                    <li style="text-align:justify;">
                      Please clear browser cache before filling the form.
                      <br />For Desktop Browsers: Press
                      <code>Ctrl + f5</code> or
                      <code>Clear Browser History</code>
                      <br />For Mobile Browsers:
                      <code>Clear Browser History</code>
                      <br />For TNP Homesreen App:
                      <code>Delete App and Clear Browser History</code>
                    </li>
                    
                    <li style="text-align: justify;">Students must fill all the details accurately.</li>

                    <li
                      style="text-align: justify;"
                    >The credentials that you mention should match with your original documents.</li>

                    <li
                      style="text-align: justify;"
                    >No redundancy should be there in the information provided.</li>

                    <li
                      style="text-align: justify;"
                    >Students should make sure that their Email id&rsquo;s and Mobile numbers are filled accurately.</li>

                    <li style="text-align: justify;">
                      Students should check the gazettes properly before filling the
                      semester details.
                    </li>

                    <li style="text-align: justify;">
                      Students must mention their height in centimetres and weight in
                      kgs.
                    </li>

                    <li
                      style="text-align: justify;"
                    >The format for Date of birth should be (dd/mm/yyyy).</li>

                    <li style="text-align: justify;">Initials of name must be in Upper-case.</li>

                    <li style="text-align: justify;">
                      The validity of category certificates should be checked before
                      filling.
                    </li>

                    <li style="text-align: justify;">
                      The year gap should be mentioned properly. For eg. If you have
                      dropped one year after your 12th or Diploma then the year gap is &lsquo;1&rsquo;.
                    </li>

                    <li
                      style="text-align: justify;"
                    >Students should fill their Active and Passive backlogs accurately.</li>

                    <li style="text-align: justify;">
                      Active backlogs are the pending backlogs that are yet to be
                      cleared and the Passive backlogs are the one that has been cleared.
                    </li>

                    <li style="text-align: justify;">For Active Backlogs put SGPA as 0.</li>

                    <li style="text-align: justify;">
                      Students must fill their 10th CGPA or Percentage depending upon
                      their examination boards.
                    </li>

                    <li style="text-align: justify;">
                      Don&rsquo;t forget the documents else strict action will be taken
                      against you.
                    </li>
                  </ol>
                </div>

                <div class="col-lg-11 pull-left mx-auto form-group">
                  <label for="checkbox">
                    <input
                      type="checkbox"
                      name="terms"
                      v-validate="'required'"
                      class="form-check-input"
                    />

                    <strong>I Agree to the terms and conditions given above.</strong>

                    <span class="text-danger pull-right" v-show="errors.has('terms')">
                      {{
                      errors.first('terms') }}
                    </span>
                  </label>

                  <div class="text-center">
                    <!-- <input type="submit" class="btn btn-lg btn-primary" value="I Agree"> -->
                    <button class="btn btn-info btn-lg btn-primary" type="submit" value="I Agree">
                      <span v-if="!load">I Agree</span>
                      <span v-else>
                        <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import {
  firstLoginURL,
  statusChangeURL,
  storeStudentURL,
  storeStudentMeURL,
  storeStudentPeURL,
  storeStudentDegreeURL,
  storeStudentAggregateURL,
  formstepChangeURL
} from "../../config.js";

export default {
  data() {
    return {
      id: {
        id: this.$parent.id
      },

      tnc: {
        form_status: "pending",

        id: this.$parent.id
      },

      username: {
        univ_roll_no: this.$parent.username
      },

      form_step: {
        student_form_step: "Email",

        id: this.$parent.id
      },

      sem_create: {
        univ_roll_no: this.$parent.username,
        semester: "1-2-3-4-5-6-7-8",
        obtained_marks: "0-0-0-0-0-0-0-0",
        max_marks: "0-0-0-0-0-0-0-0",
        credits: "0-0-0-0-0-0-0-0",
        active_backlog: "0-0-0-0-0-0-0-0",
        passive_backlog: "0-0-0-0-0-0-0-0",
        percentage: "0-0-0-0-0-0-0-0",
        semester_status: "1"
      },
      load: false
    };
  },

  methods: {
    nextStep() {
      this.$validator.validateAll().then(result => {
        if (result) {
          this.submit();
          return;
        }
      });
    },

    getAuthUser(name) {
      return this.$store.getters.getAuthUser(name);
    },

    submit() {
      this.load = true;
      axios
        .post(firstLoginURL, this.id)
        .then(response => {
          if (response.status == 200) {
            axios
              .post(statusChangeURL, this.tnc)
              .then(res => {
                if (res.status == 200) {
                  axios
                    .post(formstepChangeURL, this.form_step)
                    .then(stat => {
                      if (stat.status == 200) {
                        // this.$router.push('req');
                        this.load = false;
                        this.$parent.step = 2;
                      }
                    })
                    .catch(erro => {
                      console.log(erro);
                      this.load = false;
                    });
                }
              })
              .catch(err => {
                console.log(err);
              });
          }
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
<style scoped>
</style>

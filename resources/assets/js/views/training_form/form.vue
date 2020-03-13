<template>
  <div class="body">
    <div class="sticky-top">
      <nav class="navbar bg-blue">
        <!-- Brand -->
        <router-link class="navbar-brand d-none d-lg-block" to="/">
          <img src="/logo.png" alt="logo" height="55px" width="55px" />
          <span class="tnp">
            <strong>Training & Placement Cell</strong>
          </span>
        </router-link>
        <router-link class="navbar-brand d-lg-none" to="/">
          <img src="/logo.png" alt="logo" height="55px" width="55px" />
        </router-link>
        <div class="navbar">
          <div class="mr-auto d-none d-md-block w-65"></div>
          <ul class="nav navbar-nav" id="list-menu">
            <li class="nav-item">
              <router-link to="/" class="pull-right nav-link">
                <i class="fa fa-long-arrow-left tnp" aria-hidden="true"></i>
                <span class="tnp">Back</span>
              </router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container justify-content-center">
      <h1 class="text-center m pnt">TRAINING FORM</h1>
      <form @submit.prevent="valida" class="form" enctype="multipart/form-data">
        <div class="input-group">
          <label for="name" class="col-lg-6 m pnt">Full Name</label>
          <input
            type="text"
            class="col-lg-6 form-control inp m"
            name="name"
            id="fullName"
            v-model="user.name"
            required
          />
        </div>
        <div class="input-group" :class="{error: validation.hasError('user.urn')}">
          <label for="urn" class="col-lg-6 m pnt">University Roll Number</label>
          <input
            type="text"
            class="col-lg-6 form-control inp m"
            name="roll"
            id="urn"
            v-validate="'required|numeric|length:7'"
            v-model="user.urn"
            required
          />
          <div class="message">{{ validation.firstError('user.urn') }}</div>
        </div>
        <div class="input-group" :class="{error: validation.hasError('user.vurn')}">
          <label for="roll" class="col-lg-6 m pnt">Re-Enter University Roll Number</label>
          <input
            type="text"
            class="col-lg-6 form-control inp m"
            name="ro"
            id="roll"
            v-validate="'required|numeric|length:7'"
            v-model="user.vurn"
            required
          />
          <div class="message">{{ validation.firstError('user.vurn') }}</div>
        </div>
        <div class="input-group">
          <label for="branch" class="col-lg-6 m pnt">Branch</label>
          <select class="col-lg-6 form-control" name="branch" v-model="user.branch" id="branch">
            <option value="Civil Engineering">Civil Engineering</option>
            <option value="Electrical Engineering">Electrical Engineering</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option
              value="Electronics & Communication Engineering"
            >Electronics & Communication Engineering</option>
            <option value="Computer Science & Engineering">Computer Science & Engineering</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Production Engineering">Production Engineering</option>
          </select>
        </div>
        <div class="input-group">
          <label for="Company" class="col-lg-6 m pnt">Training Company</label>
          <input
            type="text"
            class="col-lg-6 form-control inp m"
            name="company"
            id="company"
            v-model="user.company"
            required
          />
        </div>
        <div class="input-group">
          <label for="mobile" class="col-lg-6 m pnt">Mobile Number</label>
          <input
            type="tel"
            class="col-lg-6 form-control inp m"
            name="tel"
            id="mobile"
            v-model="user.number"
            required
          />
        </div>
        <div class="input-group">
          <label for="email" class="col-lg-6 m pnt">E-Mail ID</label>
          <input
            type="email"
            class="col-lg-6 form-control inp m"
            name="email"
            id="email"
            v-model="user.email"
            required
          />
        </div>
        <center>
          <div class="form-group m">
            <input type="submit" value="Download PDF" class="btn btn-primary" name="subtn" />
          </div>
          <div class="alert alert-success" id="succc">Form downloaded successfully!</div>
          <div class="alert alert-danger" v-if="sub" id="dang"></div>
        </center>
      </form>
    </div>
    <footer class="container-fluid footer mt-3" style="left:0;">
      <p class="text-center">
        <small>
          Developed with
          <span class="text-danger">
            <i class="fa fa-heart" aria-hidden="true"></i>
          </span> by
          <router-link to="/genconian">Genconians</router-link>| © 2020
          <a href="https://www.gndec.ac.in/" target="_blank">
            GNDEC,
            Ldh
          </a>
        </small>
      </p>
    </footer>
  </div>
</template>
<script>
import SimpleVueValidation from "simple-vue-validator";

const Validator = SimpleVueValidation.Validator;

export default {
  data() {
    return {
      user: {
        name: "",
        urn: "",
        vurn: "",
        email: "",
        number: "",
        branch: "",
        company: ""
      },
      sub: false
    };
  },
  mounted: function() {
    $("#dang").hide();
    $("#succc").hide();
  },
  validators: {
    "user.urn": function(value) {
      return Validator.value(value)
        .required()
        .minLength(7);
    },
    "user.vurn, user.urn": function(vurn, urn) {
      if (this.submitted || this.validation.isTouched("user.vurn")) {
        return Validator.value(vurn)
          .required()
          .match(urn);
      }
    }
  },
  methods: {
    valida() {
      this.$validator.validateAll().then(result => {
        let err = Validator.value(this.user.vurn)
          .required()
          .match(this.user.urn);
        if (result && err._messages[0] != "Not matched.") {
          this.generate();
        } else {
          alert("Please fill the correct details");
        }
      });
    },
    generate() {
      var u = this;
      $("#succc").show();
      axios({
        method: "post",
        url: "api/form/pdf",
        responseType: "arraybuffer",
        data: this.user,
      }).then(function(response) {
        u.user.name = "";
        u.user.urn = "";
        u.user.vurn = "";
        u.user.email = "";
        u.user.number = "";
        u.user.branch = "";
        u.user.company = "";
        $("#succc").hide("slow");
        let blob = new Blob([response.data], { type: "application/pdf" });
        let link = document.createElement("a");
        link.href = window.URL.createObjectURL(blob);
        link.download = "Training Form.pdf";
        link.click();
      });
    }
  }
};
</script>
<style scoped>
.tnp {
  color: white;
}

.pnt {
  color: black;
}

.bg-blue {
  background-color: #0275d8 !important;
}

.container {
  background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
  margin-top: 10px;
  margin-bottom: 70px;
}
label {
  font-size: 3vmin;
}

.form-control {
  font-size: 3vmin;
}

.btn {
  font-size: 3vmin;
}

.m {
  padding: 2vmin;
}

.btn-primary {
  background-color: #0080ff;
  color: white;
}

.btn-primary:hover {
  background-color: white;
  color: #0080ff;
}

.btn-primary:active {
  background-color: unset;
  color: unset;
}

.inp {
  border: none;
  border-radius: 0%;
  outline: none;
  margin-bottom: 2%;
  background-color: transparent;
  border-bottom: 2px solid #480048;
}

.inp:focus {
  transition: 3s;
  border: none;
  border-radius: 0%;
  outline: 5px transparent;
  background-color: transparent;
  border-bottom: 2px solid #c04848;
}

select {
  outline: none;
  border: none;
  background: transparent;
  margin-bottom: 2%;
  border-bottom: 2px solid #480048;
}

select:focus {
  outline: none;
  border: none;
  background: transparent;
  border-bottom: 2px solid #c04848;
}
</style>
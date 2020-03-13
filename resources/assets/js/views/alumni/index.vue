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
    <div class="container">
      <div class="jumbo mt-5 mb-5">
        <h3 class="text-center">Our Prominent Alumnis</h3>
      </div>
      <div class="row">
        <table class="table table-striped table-fixed table-sm">
          <thead>
            <tr class="thead-dark text-center">
              <th scope="col">S.No.</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">WhatsApp Contact</th>
              <th scope="col">Pass Year</th>
              <th scope="col">Current Position</th>
              <th scope="col">Current Organisation</th>
              <th scope="col">Branches</th>
              <th scope="col">Job Designation</th>
              <th scope="col">Job Location</th>
              <th scope="col">Salary</th>
              <th scope="col">Vacancy</th>
              <th scope="col">Category</th>
              <th scope="col">Post Link</th>
              <th scope="col">Techinal Requirement</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr v-for="alumni in alumnis" :key="alumni">
              <td>{{ alumni.id }}</td>
              <td>{{ alumni.name }}</td>
              <td>{{ alumni.email }}</td>
              <td>{{ alumni.phone_number }}</td>
              <td>{{ alumni.whatsapp_cont }}</td>
              <td>{{ alumni.pass_year }}</td>
              <td>{{ alumni.current_position }}</td>
              <td>{{ alumni.current_organisation }}</td>
              <td>{{ alumni.branches }}</td>
              <td>{{ alumni.job_des }}</td>
              <td>{{ alumni.job_location }}</td>
              <td>{{ alumni.salary }}</td>
              <td>{{ alumni.vacancy }}</td>
              <td>{{ alumni.category }}</td>
              <td>{{ alumni.post_link }}</td>
              <td>{{ alumni.tech_req }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div>
      <app-footer></app-footer>
    </div>
  </div>
</template>

<script>
import AppFooter from "./../../layouts/footer";

export default {
  data() {
    return {
      alumnis: []
    };
  },
  components: {
    AppFooter
  },
  created() {
    axios
      .get("/api/alumni_posts")
      .then(response => {
        this.alumnis = response.data.data;
        let i = 1;
        for (var alumni in this.alumnis) this.alumnis[alumni].id = i++;
        //console.log(alumnis);
      })
      .catch(error => {
        console.log(error.response);
      });
  }
};
</script>
<style scoped>
.jumbo {
  background: transparent;
}

h3 {
  font-size: 5vmin;
}
td {
  border: 1px solid black !important;
}
th {
  position: sticky;
  top: 0;
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}
.table {
  position: relative;
  border-collapse: collapse;
}

.row {
  width: 100%;
  height: 500px;
  overflow-x: scroll;
  overflow-y: scroll;
}

.tnp {
  color: white;
}

.pnt {
  color: black;
}

.bg-blue {
  background-color: #0275d8 !important;
}

.footer{
  left: 0 !important;
}
</style>

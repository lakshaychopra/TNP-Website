<template>
  <div>
    <!-- <button @click="enableSave">Enable</button>
    <button @click="go()">goto</button>-->
       <form v-on:submit.prevent="storeFilter">

    <vue-good-wizard ref="wizard" :steps="steps" :onNext="nextClicked" :onBack="backClicked">
      <div slot="page1">
        <div id="app">
          <!-- <div class="container"> -->
            <!-- <form class="form" action="/action_page.php"> -->
           
              <div id="header"></div>
              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="10th">10th:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="10th"
                    placeholder="Enter 10th(%age)"
                    name="TenthPercentage"
                    v-model="filter.TenthPercentage"
                  >
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="12th">12th:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="12th"
                    placeholder="Enter 12th(%age)"
                    name="TwelthPercentage"
                    v-model="filter.TwelthPercentage"
                  >
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="Diploma">Diploma:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Diploma"
                    placeholder="Enter Diploma(%age)"
                    name="TwelthPercentage"
                    v-model="filter.TwelthPercentage"
                  >
                </div>
              </div>
</div>
<div class="row">
              <div class="form-group col-md-6">
                <label for="CGPA">CGPA:</label>
    <input v-validate="'required'" type="text" class="form-control text-capitalize"  
    id="CGPA" placeholder="Enter CGPA" name="CGPA" v-model="filter.CGPA">
    
              </div>
              <div class="form-group col-md-6">
                <label for="gap">Year gap:</label>
                <input
                  type="number"
                  class="form-control"
                  id="gap"
                  placeholder="Enter Year Gap"
                  name="year_gap"
                  min="0"
                  max="3"
                  v-model="filter.year_gap"
                >
              </div>
</div>
<div class="row">
              <div class="form-group col-md-6">
                <label for="active">Active Backlog:</label>
                <input
                  type="number"
                  class="form-control"
                  id="active"
                  placeholder="Enter Active"
                  name="active_backlog"
                  min="0"
                  v-model="filter.active_backlog"
                >
              </div>
              <div class="form-group col-md-6">
                <label for="passive">Passive Backlog:</label>
                <input
                  type="number"
                  class="form-control"
                  id="passive"
                  placeholder="Enter Passive"
                  name="passive_backlog"
                  v-model="filter.passive_backlog"
                  min="0"
                >
              </div>
</div>
<div class="row">
              <label for="gender">Gender:</label>
              
                <div class="form-group col-md-3">
                  <div class="checkbox-inline">
                    <label>
                      <input type="radio" value="Male" name="gender" v-model="filter.gender">Male
                    </label>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <div class="checkbox-inline">
                    <label>
                      <input type="radio" value="Female" name="gender" v-model="filter.gender">Female
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <label for="course">Select Branch:</label>
                <select 
                 multiple="multiple"
      
                  class="form-control branch"
                  id="course"
                  name="branch_type"
                  v-model="filter.branch_type"
                >
                  <option>CSE</option>
                  <option>IT</option>
                  <option>CE</option>
                  <option>PE</option>
                  <option>ME</option>
                  <option>ECE</option>
                  <option>EE</option>
                </select>


               
               


              </div>
          <!-- </div> -->
        </div>
      </div>
      <div slot="page2">
        <div class="grid-wrapper">
          <!-- <div class="container"> -->
            <div class="row">
              <div class="card-wrapper col-md-3">
                <input
                  class="c-card"
                  type="checkbox"
                  id="1"
                  value="1"
                  checked="checked"
                  name="univ_roll_no"
                  v-model="filter.univ_roll_no"
                >
                <div class="card-content">
                  <div class="card-state-icon"></div>
                  <label for="1">
                   <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                   
                    <h4>Uni Roll no</h4>
                    <h5> Click to Select</h5>
                    <p class="small-meta dim">Date sent</p>
                  </label>
                </div>
              </div>

              <div class="card-wrapper col-md-3">
                <input
                  class="c-card"
                  type="checkbox"
                  id="2"
                  value="2"
                  checked="checked"
                  name="name"
                  v-model="filter.name"
                >
                <div class="card-content">
                  <div class="card-state-icon"></div>
                  <label for="2">
                    <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                    <h4>Name</h4>
                    <h5> Click to Select</h5>
                    <p class="small-meta dim">Date sent</p>
                  </label>
                </div>
              </div>

              <div class="card-wrapper col-md-3">
                <input
                  class="c-card"
                  type="checkbox"
                  id="3"
                  value="3"
                  name="branch"
                  v-model="filter.branch"
                >
                <div class="card-content">
                  <div class="card-state-icon"></div>
                  <label for="3">
                    <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                    <h4>Branch</h4>
                    <h5> Click to Select</h5>
                    <p class="small-meta dim">Date sent</p>
                  </label>
                </div>
              </div>

              <div class="card-wrapper col-md-3">
                <input
                  class="c-card"
                  type="checkbox"
                  id="4"
                  value="4"
                  name="gender"
                  v-model="filter.gender"
                >
                <div class="card-content">
                  <div class="card-state-icon"></div>
                  <label for="4">
                    <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                    <h4>Gender</h4>
                    <h5> Click to Select</h5>
                    <p class="small-meta dim">Date sent</p>
                  </label>
                </div>
              </div>
              
              
            </div>
          
          <div class="row">
       <div class="card-wrapper col-md-3">
              <input
                class="c-card"
                type="checkbox"
                id="5"
                value="5"
                name="email"
                v-model="filter.email"
                 >
               <div class="card-content">
                <div class="card-state-icon"></div>
                <label for="5">
                  <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                  <h4>Email</h4>
                  <h5> Click to Select</h5>
                  <p class="small-meta dim">Date sent</p>
                </label>
              </div>
            </div>

            <div class="card-wrapper col-md-3">
              <input
                class="c-card"
                type="checkbox"
                id="6"
                value="6"
                name="phone_number"
                v-model="filter.phone_number"
              >
              <div class="card-content">
                <div class="card-state-icon"></div>
                <label for="6">
                  <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                  <h4>Phone no</h4>
                  <h5> Click to Select</h5>
                  <p class="small-meta dim">Date sent</p>
                </label>
              </div>
            </div>

            <div class="card-wrapper col-md-3">
              <input
                class="c-card"
                type="checkbox"
                id="7"
                value="7"
                name="class_roll_no"
                v-model="filter.class_roll_no"
              >
              <div class="card-content">
                <div class="card-state-icon"></div>
                <label for="7">
                 <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                  <h4>Class Roll No</h4>
                  <h5> Click to Select</h5>
                  <p class="small-meta dim">Date sent</p>
                </label>
              </div>
            </div>

            <div class="card-wrapper col-md-3">
              <input
                class="c-card"
                type="checkbox"
                id="8"
                value="8"
                name="TenthPercentage"
                v-model="filter.TenthPercentage"
              >
              <div class="card-content">
                <div class="card-state-icon"></div>
                <label for="8">
                  <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                  <h4>10th</h4>
                  <h5> Click to Select</h5>
                  <p class="small-meta dim">Date sent</p>
                </label>
              </div>
            </div>

            <div class="card-wrapper col-md-3">
              <input
                class="c-card"
                type="checkbox"
                id="9"
                value="9"
                name="TwelthPercentage"
                v-model="filter.TwelthPercentage"
              >
              <div class="card-content">
                <div class="card-state-icon"></div>
                <label for="9">
                  <div><i class="fa fa-address-book fa-4x" aria-hidden="true"></i></div>
                  <h4>12th</h4>
                  <h5> Click to Select</h5>
                  <p class="small-meta dim">Date sent</p>
                </label>
              </div>
            </div>

            <div class="card-wrapper col-md-3">
              <input
                class="c-card"
                type="checkbox"
                id="10"
                value="10"
                name="Percentage"
                v-model="filter.Percentage"
              >
              <div class="card-content">
                <div class="card-state-icon"></div>
                <label for="10">
                 <div><i class="fa fa-address-book fa-4x heading" aria-hidden="true"></i></div>
                  <h4>Degree</h4>
                  <h5> Click to Select</h5>
                  <p class="small-meta dim">Date sent</p>
                </label>
              </div>
            </div>
          </div>
</div>
          
        <!-- </div> -->
              <button type="submit" @click="storeFilter()" class="pull-right">Submit</button> 
      </div>
      <!-- <div slot="page3"> -->
      <!-- </div> -->

    </vue-good-wizard>
            </form>

  </div>
</template>

<style>
button
{
  position: absolute;
    bottom: 0;
    right: 0;
    border: 0;
    padding: 15px 32px;
    color: #fff;
    font-weight: 700;

}
.pull-right
{
  background-color: green;
  z-index: 1001;
}

h1 {
  text-align: center;
}
.small-meta {
  font-size: 12px;
}
.dim {
  opacity: 0.4;
}

.grid-wrapper {
  margin: 0 auto;
  width: 80%;
  padding: 10px;
}
.card-content {
  border: 1px solid #ccc;
  border-radius: 3px;
  padding: 10px 10px 10px 25px;
  text-align: center;
}
.card-content * {
  cursor: pointer;
}
.card-wrapper {
  position: relative;
  padding-top: 30px;
  float: left;
  
}
.c-card {
  position: absolute;
  top: 0px;
  left: 0;
  opacity: 0;
  visibility: hidden;
}
.c-card ~ .card-content {
  transition: all 500ms ease-out;

}
.c-card ~ .card-content .card-state-icon {
  position: absolute;
  top: 5px;
  right: 5px;
  z-index: 2;
  width: 20px;
  height: 20px;
  background: url("http://alvarosanchez.com/images/c-state-icons.svg") no-repeat;
  background-position: 0 0;
  transition: all 100ms ease-out;
  
}
.c-card ~ .card-content:before {
  position: absolute;
  top: 30px;
  right: 16px;
  content: "";
  width: 0;
  height: 0;
  border-top: 52px solid #ccc;
  border-left: 52px solid transparent;
  transition: all 200ms ease-out;
}
.c-card ~ .card-content:after {
  position: absolute;
  top: 31px;
  right: 16px;
  content: "";
  width: 0;
  height: 0;
  border-top: 50px solid #fff;
  border-left: 50px solid transparent;
  transition: all 200ms ease-out;
}
.c-card ~ .card-content:hover {
  border: 1px solid #6dc5dc;
}
.c-card ~ .card-content:hover .card-state-icon {
  background-position: -20px 0;
}
.c-card ~ .card-content:hover:before {
  border-top: 52px solid #6dc5dc;
}
.c-card:checked ~ .card-content {
  border: 1px solid #6dc5dc;
}
.c-card:checked ~ .card-content .card-state-icon {
  background-position: -90px 2px;
}
.c-card:checked ~ .card-content:before {
  border-top: 52px solid #6dc5dc;
}
.c-card:checked ~ .card-content:after {
  border-top: 52px solid #6dc5dc;
}
.c-card:checked:hover ~ .card-content .card-state-icon {
  background-position: -60px 2px;
}
.c-card:checked:hover ~ .card-content:before {
  border-top: 52px solid #6dc5dc;
}
.c-card:checked:hover ~ .card-content:after {
  border-top: 52px solid #6dc5dc;
}




input[type="text"],
select.form-control{
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="text"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>

<script>

// import { GoodWizard } from '../dist/vue-good-wizard.es.js';

export default {
  name: "demo",
  data() {
    return {
      filter: {
        univ_roll_no: "",
        class_roll_no: "",
        name: "",
        branch_type: [],
        stream: "",
        gender: "",
        email: "",
        phone_number: "",
        TenthPercentage: "",
        TwelthPercentage: "",
        year_gap: "",
        percentage: "",
        active_backlog: "",
        passive_backlog: ""
      },
      // step1: "",
      // step2: "",
      // cStep: 1,
      // steps: [
      //   {
      //     label: "Select Items",
      //     slot: "page1"
      //   },
      //   {
      //     label: "Add Constraints",
      //     slot: "page2"
      //   }
        // {
        //   label: 'Review',
        //   slot: 'page3',
        // },
        // {
        //   label: 'Apply',
        //   slot: 'page4',
        //   // options: {
        //   //   nextDisabled: true,
        //   // }
        // }
      // ]
    };
  },
  methods: {
    nextClicked(currentPage) {
      console.log("next clicked", currentPage);
      return true; //return false if you want to prevent moving to next page
    },
    backClicked(currentPage) {
      console.log("back clicked", currentPage);
      return true; //return false if you want to prevent moving to previous page
    },
    enableSave() {
      this.steps[3].options.nextDisabled = false;
    },
    storeFilter() {
      console.log("hello");
      console.log(this.filter.TenthPercentage);
      // var navigate = this;
      const filterData = {
        univ_roll_no: this.filter.univ_roll_no,
        class_roll_no: this.filter.class_roll_no,
        name: this.filter.name,
        branch_type: this.filter.branch_type,
        stream: this.filter.stream,
        gender: this.filter.gender,
        email: this.filter.email,
        phone_number: this.filter.phone_number,
        TenthPercentage: this.filter.TenthPercentage,
        TwelthPercentage: this.filter.TwelthPercentage,
        year_gap: this.filter.year_gap,
        percentage: this.filter.percentage,
        active_backlog: this.filter.active_backlog,
        passive_backlog: this.filter.passive_backlog
      };
      let formData = new FormData();
      formData.append("univ_roll_no", filterData.univ_roll_no);
      formData.append("class_roll_no", filterData.class_roll_no);
      formData.append("branch_type", filterData.branch_type);
      formData.append(" stream", filterData.stream);
      formData.append("gender", filterData.gender);
      formData.append("email", filterData.email);
      formData.append("phone_number", filterData.phone_number);
      formData.append("TenthPercentage", filterData.TenthPercentage);
      formData.append("TwelthPercentage", filterData.TwelthPercentage);
      formData.append("year_gap", filterData.year_gap);
      formData.append("percentage", filterData.percentage);
      formData.append("active_backlog", filterData.active_backlog);
      formData.append("passive_backlog", filterData.passive_backlog);

      formData.append("_method", "PUT");

      axios.post("/api/dashboard/filter", formData
             ).then(response => {
          console.log(response + " hi ");
          }).catch(error => {
          console.log(error);
        });
      }
    }
  }
  
  
  // components: {
  //   'vue-good-wizard': GoodWizard,
  // }

</script>

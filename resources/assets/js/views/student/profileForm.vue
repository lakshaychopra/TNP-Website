<template>
<div class="row">
  <div class="col-12">
    <form method="post" @submit.prevent="validateForm">
      <!-- student section -->

      <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">Profile Details</h2>
              <div class="row">
                <div class="col-lg-3 col-lg-3 col-md-3 col-sm-12 col-sm-12">
                  <div class="form-group">
                    <input
                      type="text"
                      id="username"
                      v-validate="'required'"
                      name="first_name"
                      v-model="student.first_name"
                      class="form-control text-capitalize"
                      @focus="tooltip()"
                      @focusout="removetooltip()"
                    />
                    <small class="form-text text-primary text-uppercase">
                      First Name
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('first_name')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-lg-3 col-lg-3 col-md-3 col-sm-12 col-sm-12">
                  <div class="row">
                    <div class="col-md-10">
                      <input
                        type="text"
                        v-validate="'required'"
                        name="last_name"
                        v-model="student.last_name"
                        class="form-control text-capitalize"
                        @focus="tooltip()"
                        @focusout="removetooltip()"
                      />
                      <small class="form-text text-primary text-uppercase">
                        Last Name
                        <span
                          class="text-danger pull-right"
                        >{{errors.first('last_name')}}</span>
                      </small>
                    </div>
                    <div class="col-sl-1">
                      <button
                        type="button"
                        class="instruction"
                        data-toggle="popover"
                        data-trigger="focus"
                        title="Instruction"
                        data-content="
                                1. The Last name is Mandatory and if not mention the last name of father."
                        @mouseup="popscreen()"
                      >
                        <i class="far fa-question-circle"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <DatePick
                    v-model="student.dob"
                    :format="'DD/MM/YYYY'"
                    v-validate="'required'"
                    class="form-control"
                  ></DatePick>
                  <small class="form-text text-primary text-uppercase">
                    Date of Birth
                    <span class="text-danger pull-right">{{errors.first('dob')}}</span>
                  </small>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <div class="form-group">
                    <select
                      id="category"
                      name="category"
                      v-validate="'required'"
                      v-model="student.category"
                      :class="{'form-control': true, 'error': errors.has('category')}"
                    >
                      <option disabled selected value>Category</option>
                      <option value="GENERAL">GENERAL</option>
                      <option value="SC">SC</option>
                      <option value="ST">ST</option>
                      <option value="OBC">OBC</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Category
                      <span
                        v-show="errors.has('category')"
                        class="text-danger pull-right"
                      >{{errors.first('category')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label
                      for="gender"
                      class="col-lg-4 col-md-4 col-sm-12 col-form-label text-primary text-uppercase"
                    >Gender :</label>
                    <div class="col-lg-3 col-md-3 col-sm-12 md-radio md-radio-inline">
                      <input
                        type="radio"
                        v-validate="'required'"
                        name="gender"
                        v-model="student.gender"
                        id="male"
                        value="MALE"
                      />
                      <label for="male">MALE</label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 md-radio md-radio-inline">
                      <input
                        type="radio"
                        name="gender"
                        v-model="student.gender"
                        id="female"
                        value="FEMALE"
                      />
                      <label for="female">FEMALE</label>
                    </div>
                    <small class="text-danger text-uppercase">{{ errors.first('gender') }}</small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="number"
                      maxlength="4"
                      v-validate="'required|numeric|length:3|max:4'"
                      max="9999"
                      id="height"
                      min="0"
                      name="height"
                      v-model="student.height"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Height(In cms)
                      <span class="text-danger pull-right">{{errors.first('height')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="number"
                      maxlength="4"
                      min="0"
                      v-validate="'required|numeric|max:4'"
                      max="9999"
                      name="weight"
                      v-model="student.weight"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Weight(In kg)
                      <span class="text-danger pull-right">{{errors.first('weight')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="blood_group"
                      v-validate="'required'"
                      v-model="student.blood_group"
                      :class="{'form-control': true, 'error': errors.has('blood_group')}"
                    >
                      <small class="form-text text-primary text-uppercase">Weight</small>
                      <option disabled value>Blood Group</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Blood Group
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('blood_group')}}</span>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Academic Section -->

      <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">Academic Details</h2>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="number"
                      min="0"
                      name="uniRoll"
                      v-model="student.univ_roll_no"
                      class="form-control"
                      disabled
                    />
                    <small class="form-text text-primary text-uppercase">University Roll No.</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="number"
                      min="0"
                      maxlength="7"
                      name="Class Roll No"
                      v-model="student.class_roll_no"
                      class="form-control"
                      v-validate="'required|numeric|length:7'"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Class Roll No.
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('Class Roll No')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="living"
                      :class="{'form-control': true, 'error': errors.has('living')}"
                      v-model="student.living"
                      v-validate="'required'"
                    >
                      <option disabled value>HOSTELER / DAY SCHOLAR</option>
                      <option value="HOSTELER">HOSTELER</option>
                      <option value="DAYSCHOLAR">DAY SCHOLAR</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      HOSTELER / DAY SCHOLAR
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('living')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="batch"
                      v-validate="'required'"
                      v-model="student.batch"
                      :class="{'form-control': true, 'error': errors.has('batch')}"
                    >
                      <option value="select" disabled>SELECT</option>
                      <option value="2017-2021">2017-2021</option>
                      <option value="2019-2021">2019-2021</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Batch
                      <span class="text-danger pull-right">{{errors.first('batch')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="branch"
                      v-validate="'required'"
                      v-model="student.branch_type"
                      :class="{'form-control': true, 'error': errors.has('branch')}"
                      v-on:change="display_courses()"
                    >
                      <option disabled value>Course</option>
                      <option value="B.TECH.">B.Tech.</option>
                      <option value="M.TECH.">M.Tech.</option>
                      <option value="M.B.A.">M.B.A.</option>
                      <option value="M.C.A.">M.C.A.</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Course
                      <span class="text-danger pull-right">{{errors.first('branch')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4" id="stream">
                  <div class="form-group">
                    <select
                      name="stream"
                     // v-validate="'required'"
                      :class="{'form-control': true, 'error': errors.has('branch')}"
                      v-model="student.stream"
                    >
                      <option disabled value>Stream</option>
                      <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
                      <option
                        value="COMPUTER SCIENCE AND ENGINEERING"
                      >COMPUTER SCIENCE AND ENGINEERING</option>
                      <option value="ELECTRICAL ENGINEERING">ELECTRICAL ENGINEERING</option>
                      <option value="ELECTRONICS AND COMMUNICATION ENGINEERING">
                        ELECTRONICS AND COMMUNICATION
                        ENGINEERING
                      </option>
                      <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
                      <option value="MECHANICAL ENGINEERING">MECHANICAL ENGINEERING</option>
                      <option value="PRODUCTION ENGINEERING">PRODUCTION ENGINEERING</option>
                      <option value="N/A">N/A</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Stream
                      <span class="text-danger pull-right">{{errors.first('stream')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="section"
                      v-validate="'required'"
                      :class="{'form-control': true, 'error': errors.has('section')}"
                      v-model="student.section"
                    >
                      <option disabled value>Section</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="E">E</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Section
                      <span class="text-danger pull-right">{{errors.first('section')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="shift"
                      v-model="student.shift"
                      v-validate="'required'"
                      :class="{'form-control': true, 'error': errors.has('branch')}"
                    >
                      <option value disabled>Shift</option>
                      <option value="MORNING">MORNING</option>
                      <option value="EVENING">EVENING</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Shift
                      <span class="text-danger pull-right">{{errors.first('shift')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="training_semester"
                      v-model="student.training_semester"
                      v-validate="'required'"
                      :class="{'form-control': true, 'error': errors.has('branch')}"
                    >
                      <option value disabled>Training Semester</option>
                      <option value="7">7th Semester</option>
                      <option value="8">8th Semester</option>
                      <option value="0">N.A.</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Training Semester
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('training_semester')}}</span>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Graduation Section -->

      <div class="row" id="education">
        <div class="col-12">
          <h2 class="card-title mt-3 text-primary">Graduation Details</h2>
          <div class="form-material card">
            <div class="card-body">
              <h3 class="card-title mt-3 text-primary">Post-Graduation Details</h3>
              <div class="row">
                <div class="col-md-4" id="special_mba" style="display: none;">
                  <v-select
                    id="spec_mba"
                    v-model="spec_mba"
                    :options="['HR','Finance','Marketing']"
                    multiple
                  ></v-select>
                  <!-- <v-select v-validate="'required'" name="spec_mba" multiple v-model="this.student.spec_mba" :options="['HR','Finance','Marketing']" /> -->
                  <!-- <select name="special_mba" id="special_mba" v-validate="'required'" v-model="student.spec_mba" :class="{'form-control': true, 'error': errors.has('special_mba')}" multiple= "multiple">
                        <option value="SELECT" disabled>SELECT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">FINANCE</option>
                        <option value="marketing">MARKETING</option>
                  </select>-->
                  <small class="form-text text-primary text-uppercase">
                    Specialization
                    <span
                      class="text-danger pull-right"
                    >{{errors.first('spec_mba')}}</span>
                  </small>
                </div>
                <div class="col-md-4" id="special_mtech">
                  <div class="form-group">
                    <select
                      name="special_mtech"
                      v-validate="'required'"
                      v-model="student.spec_mtech"
                      :class="{'form-control': true, 'error': errors.has('special_mtech')}"
                    >
                      <option value="Select" disabled>SELECT</option>
                      <option value="Structural Engineering">Structural Engineering</option>
                      <option value="Environmental Engineering">Environmental Engineering</option>
                      <option value="Industrial Engineering">Industrial Engineering</option>
                      <option value="Power Engineering">Power Engineering</option>
                      <option value="geo technology">Geo Tech.</option>
                      <option
                        value="Foil Mechanical and Foundation"
                      >Foil Mechanical and Foundation</option>
                      <option value="CIVIL ENGINEERING">Civil Engineering</option>
                      <option
                        value="COMPUTER SCIENCE AND ENGINEERING"
                      >Computer Science and Engineering</option>
                      <option value="ELECTRICAL ENGINEERING">Electrical Engineering</option>
                      <option
                        value="ELECTRONICS AND COMMUNICATION ENGINEERING"
                      >Electronic and Communication Engineering</option>
                      <option value="INFORMATION TECHNOLOGY">Information Technology</option>
                      <option value="MECHANICAL ENGINEERING">Mechanical Engineering</option>
                      <option value="PRODUCTION ENGINEERING">Production Engineering</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Specialization
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('special_mtech')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="numeric"
                      name="experience"
                      class="form-control text-capitalize"
                      v-validate="'required'"
                      v-model="student.work_experience"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Work Experience
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('experience')}}</span>
                    </small>
                  </div>
                </div>
              </div>

              <!-- Under-graduation section -->

              <h3 class="card-title mt-3 text-primary">Under-Graduation Details</h3>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select
                      name="graduation"
                      v-validate="'required'"
                      v-model="student.graduation"
                      :class="{'form-control': true, 'error': errors.has('graduation')}"
                    >
                      <option value="0" disabled>SELECT</option>
                      <option value="BTECH">B-TECH</option>
                      <option value="BBA">BBA</option>
                      <option value="B.SC">B.Sc.</option>
                      <option value="BA">BA</option>
                      <option value="BCA">BCA</option>
                      <option value="BCOM">B.COM.</option>
                      <option value="Other">OTHER</option>
                    </select>
                    <small class="form-text text-primary text-uppercase">
                      Under Graduation
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('graduation')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="text"
                      name="specilization"
                      v-validate="'required'"
                      v-model="student.specialization"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Specialization
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('experience')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="number"
                      name="year_passing"
                      class="form-control text-capitalize"
                      v-validate="'required'"
                      v-model="student.passing_year"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Year of Passing
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('year_passing')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group" v-on:change="selection()">
                    <label for="marks_type" class="col-md-4 col-form-label">Marks Type:</label>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input
                          v-validate="'required'"
                          type="radio"
                          class="form-check-input"
                          name="marks_type"
                          v-model="student.marks_type"
                          value="CGPA"
                        />CGPA
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input
                          type="radio"
                          class="form-check-input"
                          name="marks_type"
                          v-model="student.marks_type"
                          value="PERCENTAGE"
                        />Percentage
                      </label>
                    </div>
                    <span class="text-danger pull-right">{{errors.first('marks type')}}</span>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12" style="display: none;" id="CGPA">
                  <div class="form-group">
                    <input
                      type="numeric"
                      v-validate="'required'"
                      name="CGPA"
                      v-model="student.CGPA"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      CGPA
                      <span class="text-danger pull-right">{{errors.first('CGPA')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12" style="display: none;" id="percentage">
                  <div class="form-group">
                    <input
                      type="numeric"
                      name="percentage"
                      v-validate="'required'"
                      v-model="student.percentage"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Percentage
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('percentage')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group files">
                    <input
                      type="file"
                      v-validate="'required'"
                      accept="application/pdf"
                      class="form-control"
                      ref="file"
                      name="file"
                      id="imageUrl"
                    />
                    <small
                      class="form-text text-primary text-uppercase"
                    >Upload Scanned Certificate (.pdf)</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Parent Section -->

      <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">Parent Details</h2>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <em id="tusername" class="tooltip">
                      Enter full name. Don't use any prefixes i.e.
                      Mr./Sr.
                    </em>

                    <input
                      type="text"
                      id="fathername"
                      name="father name"
                      v-validate="'required'"
                      v-model="student.father_name"
                      class="form-control text-capitalize"
                      @focus="tooltip()"
                      @focusout="removetooltip()"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Father's Name
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('father name')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <input
                      type="tel"
                      v-validate="'required|numeric|length:10'"
                      name="father phone"
                      v-model="student.father_phone"
                      class="form-control"
                      maxlength="10"
                      min="0"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Father's Phone Number
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('father phone')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <em id="tusername" class="tooltip">
                      Enter full name. Don't use any prefix i.e.
                      Mrs.
                    </em>
                    <input
                      type="text"
                      id="mothername"
                      v-validate="'required'"
                      name="mother name"
                      v-model="student.mother_name"
                      class="form-control text-capitalize"
                      @focus="tooltip()"
                      @focusout="removetooltip()"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Mother's Name
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('mother name')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <input
                      type="tel"
                      v-validate="'required|numeric|length:10'"
                      name="mother phone"
                      v-model="student.mother_phone"
                      class="form-control"
                      maxlength="10"
                      min="0 "
                    />
                    <small class="form-text text-primary text-uppercase">
                      Mother's Phone Number
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('mother phone')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <input
                      type="text"
                      id="father_occupation"
                      v-validate="'required'"
                      name="Father Occupation"
                      v-model="student.father_occupation"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Father Occupation
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('Father Occupation')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label
                      for="farming_background"
                      class="col-lg-5 col-md-5 col-sm-12 col-form-label text-primary text-uppercase"
                    >Farming Background:</label>
                    <div class="col-lg-3 col-md-3 col-sm-12 md-radio md-radio-inline">
                      <input
                        type="radio"
                        v-validate="'required'"
                        name="farming background"
                        v-model="student.farming_background"
                        id="option1"
                        value="Yes"
                      />
                      <label for="option1">Yes</label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 md-radio md-radio-inline">
                      <input
                        type="radio"
                        name="farming background"
                        v-model="student.farming_background"
                        id="option2"
                        value="No"
                      />
                      <label for="option2">No</label>
                    </div>
                    <small
                      class="text-danger text-uppercase"
                    >{{ errors.first('farming background') }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Address Section -->

      <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">Address Details</h2>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <input
                      v-validate="'required'"
                      type="text"
                      name="address"
                      v-model="student.address"
                      class="form-control text-capitalize"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Address
                      <span class="text-danger pull-right">{{errors.first('address')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      v-validate="'required'"
                      type="text"
                      name="city"
                      v-model="student.city"
                      class="form-control text-capitalize"
                    />
                    <small class="form-text text-primary text-uppercase">
                      City
                      <span class="text-danger pull-right">{{errors.first('city')}}</span>
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      v-validate="'required'"
                      type="text"
                      name="district"
                      v-model="student.district"
                      class="form-control text-capitalize"
                    />
                    <small class="form-text text-primary text-uppercase">
                      District
                      <span class="text-danger pull-right">{{errors.first('district')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      v-validate="'required'"
                      type="text"
                      name="state"
                      v-model="student.state"
                      class="form-control text-capitalize"
                    />
                    <small class="form-text text-primary text-uppercase">
                      State
                      <span class="text-danger pull-right">{{errors.first('state')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      v-validate="'required|numeric|length:6'"
                      type="number"
                      min="0"
                      name="pincode"
                      v-model="student.pincode"
                      class="form-control"
                      maxlength="7"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Pincode
                      <span class="text-danger pull-right">{{errors.first('pincode')}}</span>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Details -->

      <div class="row">
        <div class="col-12">
          <div class="form-material card">
            <div class="card-body">
              <h2 class="card-title mt-3 text-primary">Contact Details</h2>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="text"
                      v-validate="'required|numeric|length:10'"
                      name="whatsapp_cont"
                      v-model="student.whatsapp_cont"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Whatsapp Contact
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('whatsapp_cont')}}</span>
                    </small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="text"
                      v-validate="'required|numeric|length:10'"
                      name="phone_number"
                      v-model="student.phone_number"
                      class="form-control"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Phone Number
                      <span
                        class="text-danger pull-right"
                      >{{errors.first('phone_number')}}</span>
                    </small>
                  </div>
                </div>


                <div class="col-md-4" id="re_enter_contact">
                  <div class="form-group">
                    <input
                      type="text"
                      name="re_enter_contact"
                      id="re_enter_contact"
                      v-validate="'required|numeric|length:10'"
                      class="form-control"
                      v-model="student.re_enter_contact"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Re-Enter Mobile No
                      <span class="text-danger pull-right">{{errors.first('re_enter_contact')}}</span>
                    </small>
                  </div>
                </div>
 

                <!-- <div class="col-md-2" id="PIN" style="display: none;">
                  <div class="form-group">
                    <input
                      type="text"
                      name="PIN"
                      id="otp"
                      v-validate="'required|numeric|length:4'"
                      class="form-control"
                      v-model="student.otp"
                    />
                    <small class="form-text text-primary text-uppercase">
                      Enter OTP
                      <span class="text-danger pull-right">{{errors.first('PIN')}}</span>
                    </small>
                  </div>
                </div> -->

                <!-- <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <button
                      type="button"
                      id="verify_button"
                      class="btn btn-info"
                      v-on:click="phoneverify()"
                    >Get OTP</button>
                  </div>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <button
                      type="button"
                      id="resend_button"
                      v-show="toggle"
                      class="btn btn-info"
                      v-on:click="resend()"
                    >Resend</button>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Submit -->

      <div class="row mb-3">
        <div class="col-12">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg pull-right">
              <span v-if="!load">Submit</span>
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
</template>
<script>
import {
storeStudentURL,
formstepChangeURL,
fetchProfileURL
} from "../../config.js";
import "vue-select/dist/vue-select.css";
import DatePick from "vue-date-pick";
import "vue-date-pick/dist/vueDatePick.css";

export default {
components: { DatePick },
data() {
  return {
    userid: this.$store.state.auth.userid,
    student: {
      dob: ""
    },
    inputid: "",
    // send_otp: 0,
    //  toggle: false,
    // temp: 0,
    spec_mba: [],
    spec: "",
    profile: {
      univ_roll_no: this.$store.state.auth.username
      // 'id': this.$store.state.auth.userid,
    },
    statusChange: {
      student_form_step: "PROFILE",
      id: this.$parent.id
    },
    load: false
  };
},
beforeCreate() {
  axios
    .get("/api/dashboard/student/" + this.$parent.username + "/edit")
    .then(response => {
      //console.log(response.data.data[0]);
      // if (response.status == 200) {

      // }
      this.student = response.data.data[0];
      this.display_courses();
    })
    .catch(error => {
      console.log(error);
    });
 
},
methods: {
  // graduation function #appear and disappearance
  display_courses() {
    //console.log(this.student.branch_type);

    if (
      this.student.branch_type == "M.B.A." ||
      this.student.branch_type == "M.TECH." ||
      this.student.branch_type == "M.C.A."
    ) {
      $("#education").show();
       $("#stream").hide();
       $('#stream :input').attr('disabled',true);
       $("#stream :input").attr("disabled", true);
      $("#education :input").attr("disabled", false);
      $("#spec_mba").attr("disabled", false);
      // console.log('hello');
      if (this.student.branch_type == "M.TECH.") {
        $("#special_mtech").show();
        $("#special_mba").hide();
        $("#special_mtech :input").attr("disabled", false);
        $("#special_mba :input").attr("disabled", true);
        $("#spec_mba").attr("disabled", true);
      } else if (this.student.branch_type == "M.B.A.") {
        $("#special_mtech").hide();
        $("#special_mba").show();
        $("#spec_mba").attr("disabled", false);
        $("#special_mtech :input").attr("disabled", true);
        $("#special_mba :input").attr("disabled", false);
      } else {
        $("#special_mba").hide();
        $("#special_mtech").hide();
        $("#special_mba :input").attr("disabled", true);
        $("#special_mtech :input").attr("disabled", true);
        $("#spec_mba").attr("disabled", true);
      }
    } else {
       $("#stream").show();
      $("#education").hide();
       $("#stream :input").attr("disabled", false);
      $("#education :input").attr("disabled", true);
    }
    //console.log(document.getElementById('spec_mba'));
  },


// otp related
// resend() {
//       var self = this;
//       if ($("#resend_button").html() == "Resend") {
//         let data = new FormData();
//         data.append("phone_no", this.student.phone_number);
//         axios
//           .post("/api/dashboard/otp", data)
//           .then(function(response) {
//             // console.log(response.data);
//              $("#verify_button").html("Verify");
//             $("#PIN").show();
//             self.send_otp = response.data.send_otp;
//              document.getElementById('otp').value = '';
//             // console.log(self.send_otp);
//             toastr["success"]("OTP Sent ,Wait for a minute");
         
//           })
//           .catch(function(error) {
//             console.log(error);
//           });
//       }
   
//     },



  // phoneverify() {
  //   var self = this;
  //   if ($("#verify_button").html() == "Get OTP") {
  //     let data = new FormData();
  //     data.append("phone_no", this.student.phone_number);
  //     axios
  //       .post("/api/dashboard/otp", data)
  //       .then(function(response) {
  //         // console.log(response.data);
  //         self.toggle='true';
  //         $("#verify_button").html("Verify");
  //         $("#PIN").show();
          
  //         self.send_otp = response.data.send_otp;
  //          document.getElementById('otp').value = '';
           
  //         // console.log(self.send_otp);
          
          

  //         toastr["success"]("OTP Sent ,Wait for a minute");
  //       })
  //       .catch(function(error) {
  //         console.log(error);
  //       });
  //   }
  //   if ($("#verify_button").html() == "Verify") {
  //     if (this.student.otp == self.send_otp) {

  //       this.temp =1;
  //       $("#verify_button").html(
  //         '<i class="fa fa-check" aria-hidden="true"></i>'
  //       );
  //       toastr["success"]("OTP verified");
  //       $("#PIN").hide();
  //       $("#resend_button").hide();
  //       // console.log(this.temp);
  //     } else {
  //       ////console.log('Invalid Otp, Try resending otp');
  //       toastr["error"]("Invalid OTP, Resend and fill it correctly");

  //       console.log(this.temp);
  //     }
  //   }
  // },


  popscreen() {
    $(document).ready(function() {
      $('[data-toggle="popover"]').popover();
    });
  },

  selection() {
    console.log(this.spec_mba);
    $("#percentage :input").attr("disabled", false);
    $("#CGPA :input").attr("disabled", false);
    if (this.student.marks_type == "CGPA") {
      $("#CGPA").show();
      $("#percentage").hide();
      $("#percentage :input").attr("disabled", true);
    } else if (this.student.marks_type == "PERCENTAGE") {
      $("#CGPA").hide();
      $("#percentage").show();
      $("#CGPA :input").attr("disabled", true);
    }
  },

  tooltip() {
    //console.log('#t' + $('input').attr('id'));
    $("#t" + $("input").attr("id"))
      .addClass("tooltip--active")
      .removeClass("tooltip");
  },
  removetooltip() {
    $("#t" + $("input").attr("id"))
      .addClass("tooltip")
      .removeClass("tooltip--active");
  },
  validateForm() {
    
    this.$validator.validateAll().then(result => {
      if (result && this.student.phone_number==this.student.re_enter_contact ) {

        this.submit();
      } 

     else if(this.student.phone_number!==this.student.re_enter_contact){
       
       toastr["error"]("OOPS, Mobile No does not match"); 
     
     }


      // else if( this.temp==0){
      //  toastr["error"]("OOPS, Verify Mob no with OTP first");
      // }
      else {
       
        toastr["error"]("OOPS, Please enter missing details."); 
     
      }
    });
  },
  getAuthUser(name) {
    return this.$store.getters.getAuthUser(name);
  },
  submit() {
    if(this.student.stream == null){
      this.student.stream = "N/A";
    }
    if (document.getElementById("spec_mba").disabled) {
      for (var i = 0; i < 3; i++) {
        if (this.spec_mba[i] != undefined) {
          this.spec = this.spec + this.spec_mba[i] + " ";
        }
      }
    } else {
      this.spec = null;
    }
    // console.log(this.$parent);
    for (let x in this.student) {
      if(typeof(this.student[x]) == "string" && this.student[x] != null )
        this.student[x] = this.$parent.titleCase(this.student[x]);
    }
    this.load = true;
    let formData = new FormData();
    formData.append("first_name", this.student.first_name);
    formData.append("last_name", this.student.last_name);
    formData.append("gender", this.student.gender);
    formData.append("whatsapp_cont", this.student.whatsapp_cont);
    formData.append("dob", this.student.dob);
    formData.append("category", this.student.category);
    formData.append("height", this.student.height);
    formData.append("weight", this.student.weight);
    formData.append("blood_group", this.student.blood_group);
    formData.append("univ_roll_no", this.student.univ_roll_no);
    formData.append("class_roll_no", this.student.class_roll_no);
    formData.append("living", this.student.living);
    formData.append("batch", this.student.batch);
    formData.append("branch_type", this.student.branch_type);
    formData.append("stream", this.student.stream);
    formData.append("section", this.student.section);
    formData.append("shift", this.student.shift);
    formData.append("training_semester", this.student.training_semester);
    formData.append("father_name", this.student.father_name);
    formData.append("father_phone", this.student.father_phone);
    formData.append("mother_name", this.student.mother_name);
    formData.append("mother_phone", this.student.mother_phone);
    formData.append("father_occupation", this.student.father_occupation);
    formData.append("farming_background", this.student.farming_background);
    formData.append("address", this.student.address);
    formData.append("city", this.student.city);
    formData.append("district", this.student.district);
    formData.append("state", this.student.state);
    formData.append("pincode", this.student.pincode);
    formData.append("phone_number", this.student.phone_number);
    formData.append("spec_mba", this.spec);
    formData.append("spec_mtech", this.student.spec_mtech);
    formData.append("work_experience", this.student.work_experience);
    formData.append("graduation", this.student.graduation);
    formData.append("specialization", this.student.specialization);
    formData.append("passing_year", this.student.passing_year);
    formData.append("marks_type", this.student.marks_type);
    formData.append("CGPA", this.student.CGPA);
    formData.append("percentage", this.student.percentage);
    var imagefile = document.querySelector("#imageUrl");
    formData.append("Graduation_certificate", imagefile.files[0]);
    formData.append("_method", "PUT");
    axios
      .post(storeStudentURL + this.student.id, formData)
      .then(response => {
        axios
          .post(formstepChangeURL, this.statusChange)
          .then(statusresponse => {
            if (statusresponse.status == 200) {
              toastr['success']("Profile Updated!!");
              this.$parent.step = 4;
            }
          })
          .catch(errors => {
            console.log(errors);
          });
      })
      .catch(error => {
        console.log(error);
      });
  }
}
};
</script>
<style >
.instruction {
background: none;
border: none;
outline: none;
}
.vs__dropdown-toggle {
border-style: none none solid none !important;
}
.text-primary {
color: #0185c2 !important;
}

.col-form-label {
padding-left: 0;
}

option:nth-child(1) {
background-color: #0099ff;
color: black;
}
.vdpComponent.vdpWithInput > input {
font-size: 15px;
width: 100%;
height: 30px;
margin-top: 5px;
border: none;
}
.instruction {
margin-top: 5px;
}
.fa-question-circle {
size: 20px;
}
#education,
#stream {
display: none;
}
</style>
<style lang="scss" scoped>
$md-radio-checked-color: rgb(51, 122, 183);
$md-radio-border-color: rgba(0, 0, 0, 0.54);
$md-radio-size: 20px;
$md-radio-checked-size: 10px;
$md-radio-ripple-size: 15px;

@keyframes ripple {
0% {
  box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0);
}

50% {
  box-shadow: 0px 0px 0px $md-radio-ripple-size rgba(0, 0, 0, 0.1);
}

100% {
  box-shadow: 0px 0px 0px $md-radio-ripple-size rgba(0, 0, 0, 0);
}
}

.md-radio {
margin: 16px 0;

&.md-radio-inline {
  display: inline-block;
}

input[type="radio"] {
  display: none;

  &:checked + label:before {
    border-color: $md-radio-checked-color;
    animation: ripple 0.2s linear forwards;
  }

  &:checked + label:after {
    transform: scale(1);
  }
}

label {
  display: inline-block;
  height: $md-radio-size;
  position: relative;
  padding: 0 ($md-radio-size + 10px);
  margin-bottom: 0;
  cursor: pointer;
  vertical-align: bottom;

  &:before,
  &:after {
    position: absolute;
    content: "";
    border-radius: 50%;
    transition: all 0.3s ease;
    transition-property: transform, border-color;
  }

  &:before {
    left: 0;
    top: 0;
    width: $md-radio-size;
    height: $md-radio-size;
    border: 2px solid $md-radio-border-color;
  }

  &:after {
    top: $md-radio-size / 2 - $md-radio-checked-size / 2;
    left: $md-radio-size / 2 - $md-radio-checked-size / 2;
    width: $md-radio-checked-size;
    height: $md-radio-checked-size;
    transform: scale(0);
    background: $md-radio-checked-color;
  }
}
}

label {
position: relative;
}

.tooltip {
position: absolute;
top: -50px;
left: 0;
padding: 0.75rem 1rem;
color: transparent;
text-shadow: none;
background-color: transparent;
}

.tooltip--active {
font-size: 0.83333rem;
line-height: 1.2;
color: #323232;
background-color: #e5e5e5;

&:after {
  content: "";
  position: absolute;
  bottom: -10px;
  left: 15px;
  display: block;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 10px 10px 0 10px;
  border-color: #e5e5e5 transparent transparent transparent;
}
}
.form-group .btn-primary {
background-color: #0275d8;
}
</style>

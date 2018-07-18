<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-material card">
                    <div class="card-body">
                        <h2 class="card-title mt-3 text-primary">Profile Details</h2>

                        <!-- <post-form :id="id"></post-form> -->
                        <form method="post" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name"  placeholder="Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-2 col-form-label">Gender :  </label>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="gender" id="male" checked>       
                                            <label for="male">Male</label>

                                        </div>
                                        <div class="col-md-2 md-radio md-radio-inline">
                                            <input type="radio" name="gender" id="female" >     
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="category" class="form-control">
                                            <option selected disabled>Category</option>
                                            <option value="">General</option>
                                            <option value="">SC</option>
                                            <option value="">ST</option>
                                            <option value="">OBC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="height"  placeholder="Height" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="weight"  placeholder="Weight" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="blood_group" class="form-control">
                                            <option selected disabled>Blood Group</option>
                                            <option value="">O+</option>
                                            <option value="">O-</option>
                                            <option value="">AB+</option>
                                            <option value="">AB-</option>
                                            <option value="">A+</option>
                                            <option value="">A-</option>
                                            <option value="">B+</option>
                                            <option value="">B-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <h2 class="card-title mt-3 text-primary">Acadaemic Details</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="uniRoll"  placeholder="University Roll No." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="classRoll"  placeholder="Class Roll No." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="living" class="form-control">
                                            <option selected disabled>Hosteller / Day Scholar</option>
                                            <option value="">Hosteller</option>
                                            <option value="">Day Scholar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="batch"  placeholder="Batch" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="branch" class="form-control">
                                            <option selected disabled>Branch</option>
                                            <option value="">B.Tech</option>
                                            <option value="">M.Tech</option>
                                            <option value="">M.B.A.</option>
                                            <option value="">M.C.A.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <!-- <input type="text" name="name"  placeholder="Stream" class="form-control"> -->
                                        <select name="stream" class="form-control">
                                            <option selected disabled>Stream</option>
                                            <option value="">Civil Engineering</option>
                                            <option value="">Computer Science and Engineering</option>
                                            <option value="">Electrical Engineering</option>
                                            <option value="">Electronics and Communication Engineering </option>
                                            <option value="">Information Technology</option>
                                            <option value="">Mechenical Engineering</option>
                                            <option value="">Production Engineering</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="section"  placeholder="Section" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="shift" class="form-control">
                                            <option selected disabled>Shift</option>
                                            <option value="">Morning</option>
                                            <option value="">Evening</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="" class="col-md-4 col-form-label">Training Semester :  </label>
                                        <div class="col-md-1 md-radio md-radio-inline">
                                            <input type="radio" name="t_sem" id="7" checked>       
                                            <label for="7">7</label>
                                        </div>
                                        <div class="col-md-1 md-radio md-radio-inline">
                                            <input type="radio" name="t_sem" id="8" >     
                                            <label for="8">8</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-title mt-3 text-primary">Parent Details</h2>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fname"  placeholder="Father's Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fphone"  placeholder="Father's Phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mname"  placeholder="Mother's Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mphone"  placeholder="Mother's Phone" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <h2 class="card-title mt-3 text-primary">Address Details</h2>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="address"  placeholder="Address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="city"  placeholder="City" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="district"  placeholder="District" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="state"  placeholder="State" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="pincode"  placeholder="Pincode" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-info pull-right">
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
    import { updateProfileURL } from "../../config.js";
    import { fetchProfileURL } from "../../config.js";
    export default {
        data() {
            return {
                id: {
                    'id': this.$store.state.auth.userid,
                    student:{}
                },
                 profile: {
                    'aadhaar_no': this.$store.state.auth.username,
                },
            }
        },
         created(){
            axios.get('/api/dashboard/student/' + this.$store.state.auth.username +'/edit').then(response => {
                    console.log(response);
                    if (response.status == 200) {
                        
                    }
                }).catch(error => {
                    console.log(error);
                });
         },
        methods: {

            getAuthUser(name) {
                return this.$store.getters.getAuthUser(name);
            },
            submit() {
                console.log(this.$store.state.auth.username);
                console.log('1');
                // axios.post(firstLoginURL, this.id).then(response => {
                //     console.log(response);
                //     if (response.status == 200) {
                        
                //     }
                // }).catch(error => {
                //     console.log(error);
                // });
            }
        }
    }
</script>
<style scoped>
    .text-primary {
        color: #0185c2 !important;
    }
    .col-form-label{
        padding-left: 0;
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
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.0);
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
            &:checked+label:before {
                border-color: $md-radio-checked-color;
                animation: ripple 0.2s linear forwards;
            }
            &:checked+label:after {
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
                content: '';
                border-radius: 50%;
                transition: all .3s ease;
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
</style>
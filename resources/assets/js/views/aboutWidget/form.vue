<template>
    <form @submit.prevent="proceed">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Title<span class="input-required text-danger">*</span></label>
                    <input v-validate="'required'" class="form-control" type="text" value="" v-model="page.title" name="title"
                        autofocus maxlength="50" v-on:input="updateURL">
                    <small class="text-danger">{{ errors.first('title') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Title<span class="input-required text-danger">*</span></label>
                    <input v-validate="'required'" class="form-control" type="text" value="" v-model="page.title" name="title"
                        autofocus maxlength="50" v-on:input="updateURL">
                    <small class="text-danger">{{ errors.first('title') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Title<span class="input-required text-danger">*</span></label>
                    <input v-validate="'required'" class="form-control" type="text" value="" v-model="page.title" name="title"
                        autofocus maxlength="50" v-on:input="updateURL">
                    <small class="text-danger">{{ errors.first('title') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Page URL</label>
                    <input class="form-control" type="text" value="" v-model="page.url" name="title">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group files">
                    <label for="">Image<span class="input-required text-danger">*</span></label>
                    <input type="file" v-validate="'mimes:image/*'" class="form-control" ref="file" name="file" id="imageUrl"
                        @change="handleChange">
                    <small class="text-danger">{{ errors.first('file') }}</small>
                </div>
            </div>
        </div>

        <div class="row" v-if="page.image !=null">
            <div class="col-md-12">
                <img v-if="image_change == true " class="img-fluid" :src="img_preview" alt="Image">
                <img v-else class="img-fluid" :src="'/images/about/images/'+page.image" alt="Image">
            </div>
        </div>
        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">
            <span v-if="id">Update</span>
            <span v-else>Save</span>
        </button>
    </form>
</template>
<script>
    import helper from '../../services/helper'
    import {
        aboutWidgetURL,
        postIdGetURL,
        apiDomain
    } from "../../config.js";

    export default {
        data() {
            return {
                image_change: false,
                img_preview: '',
                page: {
                    title: '',
                    url: '',
                    content: '',
                    imagePath: '',
                    image: '',
                },
            };
        },
        components: {
            InputTag,
            'editor': Editor
        },
        props: ['id'],
        mounted() {
            if (this.id)
                this.getPage();
        },
        methods: {
            updateURL: function () {
                this.page.url = this.page.title.replace(/\s+/g, '-').toLowerCase();
            },
            updateData: function (data) {
                this.page.content = data
            },
            handleChange(e) {
                this.image_change = true;
                this.page.image = e.target.files[0];
                this.img_preview = URL.createObjectURL(this.page.image);
            },
            proceed() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        if (this.id)
                            this.updatePage();
                        else
                            this.storePage();
                    }
                });
            },
            storePage() {
                var navigate = this;
                const postData = {
                    title: this.page.title,
                    body: this.page.content,
                    username: this.$store.getters.getAuthUserFullName,
                    user_id: this.$store.getters.getAuthUserId,
                    image_path: 'images/about/images/',
                    url: this.page.url,
                    image: this.page.image
                };
                let formData = new FormData();
                formData.append('image', postData.image);
                formData.append('title', postData.title);
                formData.append('body', postData.body);
                formData.append('username', postData.username);
                formData.append('user_id', postData.user_id);
                formData.append('image_path', postData.image_path);
                formData.append('url', postData.url);
                axios.post(aboutWidgetURL, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function (response) {
                        toastr['success'](response.data.message);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.page.title = '';
                this.page.body = '';
                this.page.image = '';
                this.page.url = '';
            },
            getPage() {
                axios.get('/api/dashboard/about/' + this.id + '/edit')
                    .then(response => {
                        this.page.title = response.data.data.title;
                        this.page.content = response.data.data.body;
                        this.page.image = response.data.data.image;
                        this.page.url = response.data.data.url;
                    })
                    .catch(response => {
                        toastr['error'](response.message);
                    });
            },
            updatePage() {
                console.log(this.page.content);
                const postData = {
                    title: this.page.title,
                    body: this.page.content,
                    username: this.$store.getters.getAuthUserFullName,
                    user_id: this.$store.getters.getAuthUserId,
                    image_path: 'images/about/images/',
                    url: this.page.url,
                    image: this.page.image
                };
                let formData = new FormData();
                formData.append('image', postData.image);
                formData.append('title', postData.title);
                formData.append('body', postData.body);
                formData.append('username', postData.username);
                formData.append('user_id', postData.user_id);
                formData.append('image_path', postData.image_path);
                formData.append('url', postData.url);
                formData.append('_method', 'PUT');

                axios.post('/api/dashboard/about/' + this.id, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        console.log(response);
                        toastr['success'](response.data.message);
                        this.$router.push('../../page/' + this.page.url);
                        console.log(this.$store.getters.getAuthUserType);
                    })
                    .catch(response => {
                        toastr['error'](response.message);
                    });
            }
        }
    }
</script>
<style scoped>
    .line {
        text-align: center;
    }
    .color input {
        background-color: #f1f1f1;
    }
</style>
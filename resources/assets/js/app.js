/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import store from './store'
import router from './routes'
// import auth from './packages/auth/auth'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import infiniteScroll from 'vue-infinite-scroll';
Vue.use(infiniteScroll)

import swal from 'vue-sweetalert2';
Vue.use(swal);

import OwlCarousel from 'owl.carousel2';
Vue.use(OwlCarousel);

import VueContentPlaceholders from 'vue-content-placeholders'
Vue.use(VueContentPlaceholders);

import SocialSharing from 'vue-social-sharing';
Vue.use(SocialSharing);

import SimpleVueValidation from 'simple-vue-validator';
Vue.use(SimpleVueValidation);

import Vue from 'vue'
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)

const app = new Vue({
    el: '#root',
    store,
    router
});
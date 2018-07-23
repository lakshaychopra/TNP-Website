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
 * Nex;t, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import infiniteScroll from 'vue-infinite-scroll';
Vue.use(infiniteScroll)

import swal from 'vue-sweetalert2';
Vue.use(swal);

import SocialSharing from 'vue-social-sharing';
Vue.use(SocialSharing);

import VueHtml5Editor from 'vue-html5-editor'
Vue.use(VueHtml5Editor, {
    hiddenModules: [
        "image",
        "info",
        "full-screen",
    ],

});

const app = new Vue({
    el: '#root',
    store,
    router
});
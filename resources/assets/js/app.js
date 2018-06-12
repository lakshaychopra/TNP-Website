
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import router from './routes.js'
window.Vue = require('vue')

// import "./custom.js";
import VeeValidate from 'vee-validate'
Vue.use(VeeValidate);

import Toasted from 'vue-toasted'

Vue.use(Toasted, {
    iconPack: 'fontawesome' // set your iconPack, defaults to material. material|fontawesome
});

window.axios = require('axios');

import Auth from './packages/auth/auth.js'
Vue.use(Auth)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el:'#app',
    router:router,
    // render: h => h(app)
})
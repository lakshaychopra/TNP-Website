
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import router from './routes.js'
window.Vue = require('vue')

import 'normalize.css/normalize.css'// A modern alternative to CSS resets

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

Vue.use(ElementUI)
import './icons' // icon

import Vue from 'vue'

import { VueResource } from "vue-resource";
import VueHtml5Editor from 'vue-html5-editor'
Vue.use(VueHtml5Editor,{
     hiddenModules: [
        "image",
        "info",
        "full-screen",
     ],

});

//  import VueTrumbowyg from 'vue-trumbowyg';
//  import 'trumbowyg/dist/ui/trumbowyg.css';
 
//  Vue.use(VueTrumbowyg);

// import wysiwyg from "vue-wysiwyg";
// Vue.use(wysiwyg, {
//     maxHeight: "500px",
//     hideModules: {
//         "removeFormat": true,
//         "image": true,
//         "code":true,        
//     },
// }); 


import VeeValidate from 'vee-validate'
Vue.use(VeeValidate);

import Toasted from 'vue-toasted'

Vue.use(Toasted, {
    iconPack: 'fontawesome' // set your iconPack, defaults to material. material|fontawesome
});


// import Auth from './packages/auth/auth.js'
// Vue.use(Auth)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
import store from './store';

const app = new Vue({
    el:'#app',
    router:router,
    store:store,
    // i18n,
    // render: h => h(app)
})

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from './routes.js'
window.Vue = require('vue')

import 'normalize.css/normalize.css'// A modern alternative to CSS resets

import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/en' // lang i18n


import './styles/index.scss' // global css


// import i18n from './lang' // Internationalization
import './icons' // icon

// import './errorLog'// error log

Vue.use(Element, {
    size: 'medium', // set element-ui default size
    // i18n: (key, value) => i18n.t(key, value)
})

import VeeValidate from 'vee-validate'
Vue.use(VeeValidate);

import Toasted from 'vue-toasted'

Vue.use(Toasted, {
    iconPack: 'fontawesome' // set your iconPack, defaults to material. material|fontawesome
});


import Auth from './packages/auth/auth.js'
Vue.use(Auth)

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
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import VueResource from 'vue-resource'
Vue.use(VueResource)


import Layout from './pages/layout/Layout'

const router = new VueRouter({ 
    base: '/',
    mode: 'history',
    history: true,
    routes:[
        {   
            path: '/',
            name: 'layout',
            component: Vue.component('Layout', require('./pages/Layout.vue')),
            children: [
                {
                    path: 'home',
                    name: 'home',
                    component: Vue.component('Home', require('./pages/index.vue'))
                },
            ]
        },
        {
            path: '/admin',
            name: 'admin',
            component: Vue.component('authLayout', require('./pages/auth_layout.vue')),
            children: [
                {
                    path: 'login',
                    name: 'login',
                    component: Vue.component('login', require('./components/login.vue'))
                },
                {
                    path: 'reg',
                    name: 'reg',
                    component: Vue.component('register', require('./components/register.vue')),
                },
                {
                    path: 'security',
                    name: 'security',
                    component: Vue.component('security', require('./components/security.vue')),
                },
            ]
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Vue.component('dashboard', require('./pages/layout/Layout.vue')),
        },
       
        
        
    ],
});

export default router
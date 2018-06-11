import Vue from 'vue'
import VueRouter from 'vue-router'
// import VueResource from 'vue-resource'
Vue.use(VueRouter)
// Vue.use(VueResource)
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
                {
                    path: 'dashboard',
                    name: 'dashboard',
                    component: Vue.component('dashboard', require('./components/dashboard.vue')),
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
       
        
        
    ],
});

export default router
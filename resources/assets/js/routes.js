import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
Vue.use(VueRouter)
Vue.use(VueResource)
const router = new VueRouter({ 
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
                // {
                //     path: 'dashboard',
                //     name: 'dashboard',
                //     component: Vue.component('dashboard', require('./pages/dashboard.vue')),
                // },
            ]
        },
        {
            path: '/auth',
            name: 'auth',
            component: Vue.component('Layout', require('./pages/auth_layout.vue')),
            children: [
                {
                    path: 'login',
                    name: 'login',
                    component: Vue.component('Home', require('./components/login.vue'))
                },
                {
                    path: 'reg',
                    name: 'reg',
                    component: Vue.component('dashboard', require('./components/register.vue')),
                },
            ]
        },
        
    ],
})

export default router
import VueRouter from 'vue-router'
import helper from './services/helper'
let routes = [{
        path: '/',
        component: require('./layouts/index/pages.vue'),
        name: 'index',
    },
    
    {  path: '/registration_form',
        component: require('./views/registration/form.vue')
    },
    {
        path: '/about',
        component: require('./views/about/index.vue'),
        name: 'about',
    },
    {
        path: '/genconian',
        component: require('./views/genconian/index.vue'),
        name: 'genconian',
    },
    {
        path: '/privacy',
        component: require('./views/privacy/index.vue'),
        name: 'privacy',
    },
    {
        path: '/page/alumni_form',
        component: require('./views/alumni/form.vue'),
    },
    {
        path: '/alumni_list',
        component: require('./views/alumni/index.vue'),
    },
    {
        path: '/page/:url',
        name: 'about',
        props: true,
        component: require('./views/about/subPages.vue'),
    },
    
    {
        path: '/view/:id',
        name: 'view',
        props: true,
        component: require('./layouts/index/show.vue'),
    },
    {
        path: '/about/temp',
        component: require('./views/about/subPages'),
    },
    {
        path: '/',
        component: require('./layouts/default-page'),
        meta: {
            requiresAuth: true,
            adminAuth: true,
            userAuth: false

        },
        children: [
            // {
            //     path: '/',
            //     component: require('./views/pages/home')
            // },
            {
                path: '/admin',
                component: require('./views/pages/home')
            },
            {
                path: '/blank',
                component: require('./views/pages/blank')
            },
            {
                path: '/excel',
                component: require('./views/excel')
            },
            {
                path: '/single',
                component: require('./views/excel/single')
            },
            {
                path: '/configuration',
                component: require('./views/configuration/configuration')
            },
            {
                path: '/post',
                component: require('./views/post/index'),
            },
            {
                path: '/about/form',
                component: require('./views/about/addPage'),
            },
            {
                path: '/about/manage',
                component: require('./views/about/managePage'),
            },
            {
                path: '/about/:id/edit',
                component: require('./views/about/edit')
            },
            {
                path: '/widget/about/manage',
                component: require('./views/aboutWidget/manageAboutWidget'),
            },
            {
                path: '/widget/about/:id/edit',
                component: require('./views/aboutWidget/edit')
            },
            {
                path: '/post/:id/edit',
                component: require('./views/post/edit')
            },
            {
                path: '/post/pinned',
                component: require('./views/post/exec/pinned')
            },
            {
                path: '/post/:id',
                component: require('./views/post/show')
            },
            {
                path: '/all',
                component: require('./views/post/viewPosts')
            },
            {
                path: '/task',
                component: require('./views/task/index')
            },
            {
                path: '/task/:id/edit',
                component: require('./views/task/edit')
            },
            {
                path: '/notice',
                component: require('./views/notice/index')
            },
            {
                path: '/user',
                component: require('./views/user/index')
            },
        ]
    },


    {
        path: '/',
        component: require('./layouts/exec/default-page'),
        meta: {
            requiresAuth: true,
            execAuth: true,
            userAuth: false

        },
        children: [
            // {
            //     path: '/',
            //     component: require('./views/pages/home')
            // },
            {
                path: '/home',
                component: require('./views/pages/home')
            },
            {
                path: '/blank',
                component: require('./views/pages/blank')
            },
            {
                path: '/excel_data',
               component: require('./views/excelData/index')
            },
            // {
            //     path: '/excel',
            //     component: require('./views/excel')
            // },
            // {
            //     path: '/single',
            //     component: require('./views/excel/single')
            // },
            {
                path: '/configuration',
                component: require('./views/configuration/configuration')
            },
            {
                path: '/exec/post',
                component: require('./views/post/exec/index'),
            },
            {
                path: '/exec/post/:id/edit',
                component: require('./views/post/exec/edit')
            },
            {
                path: '/exec/post/pinned',
                component: require('./views/post/exec/pinned')
            },
            {
                path: '/exec/filter',
                component: require('./views/filter_1/filter')
            },
            {
                path: '/exec/display_student',
                component: require('./views/filter_1/display')
            },
            {
                path: '/exec/add_company',
                component: require('./views/post/exec/add_company')
            },
            {
                path: '/exec/download_list',
                component: require('./views/post/exec/download_list')
            },
            {
                path: '/exec/show_list',
                component: require('./views/post/exec/show_list')
            },
            {
                path: '/exec/post/:id',
                component: require('./views/post/exec/show')
            },
            {
                path: '/exec/all',
                component: require('./views/post/exec/viewPosts')
            },
            {
                path: '/exec/alumni',
                component: require('./views/post/exec/alumni_posts')
            },
            {
                path: '/task',
                component: require('./views/task/index')
            },
            {
                path: '/task/:id/edit',
                component: require('./views/task/edit')
            },
            {
                path: '/user',
                component: require('./views/user/index')
            },
            {
                path: '/exec/about/form',
                component: require('./views/about/addPage'),
            },
            {
                path: '/exec/about/manage',
                component: require('./views/about/managePage'),
            },
            {
                path: '/exec/about/:id/edit',
                component: require('./views/about/edit')
            },
            {
                path: '/exec/notice',
                component: require('./views/notice/index')
            },
        ]
    },

    {
        path: '/',
        component: require('./layouts/user/default-page'),
        meta: {
            requiresAuth: true,
            userAuth: true,
            adminAuth: false
        },
        children: [
            // {
            //     path: '/',
            //     component: require('./views/pages/home')
            // },
            {
                path: '/userlogin',
                component: require('./views/pages/home')
            },
        ]
    },
    {
        path: '/',
        component: require('./layouts/tnc/default-page'),
        meta: {
            requiresAuth: true,
            userAuth: false,
            adminAuth: false,
            userloginAuth: true
        },
        children: [{
                path: '/req',
                component: require('./views/student/req')
            },
            {
                path: '/aggregate',
                component: require('./views/student/aggregate')
            },
            {
                path: '/profile',
                component: require('./views/student/profile')
            },
        ]
    },

    // {
    //     path: '/',
    //     component: require('./layouts/login-security/auth_layout'),
    //     // meta: { requiresAuth: true },
    //     children: [{
    //             path: '/login',
    //             component: require('./views/authenticate/login')
    //         },
    //         {
    //             path: '/security',
    //             component: require('./views/authenticate/security')
    //         },
    //     ]
    // },
    {
        path: '/',
        component: require('./layouts/guest-page'),
        meta: {
            requiresGuest: true
        },
        children: [{
                path: '/login',
                component: require('./views/auth/login')
            },

            // {
            //     path: '/password',
            //     component: require('./views/auth/password')
            // },
            {
                path: '/auth/register',
                component: require('./views/auth/register')
            },
            {
                name: 'forget',
                path: '/forgetPassword/student',
                component: require('./views/auth/forget')
            },
            // {
            //     path: '/auth/:token/activate',
            //     component: require('./views/auth/activate')
            // },
            // {
            //     path: '/password/reset/:token',
            //     component: require('./views/auth/reset')
            // },
            // {
            //     path: '/auth/social',
            //     component: require('./views/auth/social-auth')
            // },
        ]
    },
    {
        path: '*',
        component: require('./layouts/error-page'),
        children: [{
            path: '*',
            component: require('./views/errors/page-not-found')
        }]
    }
];

const router = new VueRouter({
    routes,
    linkActiveClass: 'active',
    mode: 'history'
});

router.beforeEach((to, from, next) => {

    if (to.matched.some(m => m.meta.requiresAuth)) {
        return helper.check().then(response => {
            if (!response) {
                return next({
                    path: '/login'
                })
            } else if (to.matched.some(m => m.meta.execAuth)) {
                return helper.authUser().then(res => {
                    if (res.type == "EXECUTIVE_MEMBER") {
                        return next()
                    } else if (res.type == "ADMIN") {
                        return next({
                            path: '/admin'
                        })
                    } else {
                        return next({
                            path: '/userlogin'
                        })
                    }
                })
            } else if (to.matched.some(m => m.meta.adminAuth)) {
                return helper.authUser().then(res => {
                    if (res.type == "ADMIN") {
                        return next()
                    } else if (res.type == "EXECUTIVE_MEMBER") {
                        return next({
                            path: '/home'
                        })
                    } else {
                        return next({
                            path: '/userlogin'
                        })
                    }
                })
            } else if (to.matched.some(m => m.meta.userAuth)) {
                return helper.authUser().then(res => {
                    if (res.type == "STUDENT") {
                        //    switch (res.student_form_step) {
                        //        case "NA":
                        //            if (res.is_first_login == 0) {
                        //                return next({
                        //                    path:'/terms'
                        //                })
                        //            }
                        //            break;
                        //        case "TC":
                        //                 return next({
                        //                     path:'/profileForm'
                        //                 })
                        //            break;
                        //         default:
                        //                 return next()
                        //            break;
                        //     }
                        if (res.student_form_step == "SUBMITTED") {
                            return next()
                        } else {
                            return next({
                                 path: '/req'
                                //path: '/profile'
                            })
                        }
                    } else if (res.type == "ADMIN") {
                        return next({
                            path: '/admin'
                        })
                    } else {
                        return next({
                            path: '/home'
                        })
                    }
                })

            } else if (to.matched.some(m => m.meta.userloginAuth)) {
                return helper.authUser().then(res => {
                    if (res.type == "STUDENT") {
                        if (res.student_form_step == "SUBMITTED") {
                            return next({
                                path: '/userlogin'
                            })
                        }
                        // switch (res.student_form_step) {
                        //     case "NA":
                        //         if (res.is_first_login == 0) {
                        //             return next()
                        //         }
                        //         break;
                        //     case "TC":

                        //         break;
                        //     default:
                        //         break;
                        // }
                        return next()
                    } else {
                        return next({
                            path: '/home'
                        })
                    }
                })
            } else {
                return next()
            }
        })
    }
    //  if (to.matched.some(m => m.meta.requiresAuth)) {
    //      return helper.check().then(response => {
    //          if (!response) {
    //              return next({
    //                  path: '/login'
    //              })
    //         }
    //             //  else{
    //                 //  }

    //          return next()
    //      })
    //  }

    if (to.matched.some(m => m.meta.requiresGuest)) {
        return helper.check().then(response => {
            if (response) {
                //  return next({
                //  path: '/userlogin'
                // })
                return helper.authUser().then(res => {
                    if (res.type == "EXECUTIVE_MEMBER") {
                        return next({
                            path: '/home'
                        })

                    } else if (res.type == "ADMIN") {
                        return next({
                            path: '/admin'
                        })
                    } else {
                        return next({
                            path: '/userlogin'
                        })
                    }
                })
            }

            return next()
        })
    }

    return next()
});

export default router;
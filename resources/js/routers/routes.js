// import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/pages/Home';
import Login from "@/js/pages/Login";
import UserInfo from "@/js/pages/UserInfo";
import store from "@/js/config/handle";
import UpdateUser from "@/js/pages/UpdateUser";
import axios from "axios";

const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                title: 'Trang chủ'
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/user-info',
            name: 'user-info',
            component: UserInfo,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/update-user',
            name: 'update-user-info',
            component: UpdateUser,
            meta: {
                requiresAuth: true
            }
        }

    ],
});

router.beforeEach((to, from, next) => {

    if (to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        next({ name: 'login' })
        return
    }

    if(to.path === '/login' && store.state.isLoggedIn) {
        next({ name: 'home' })
        return
    }
    if (localStorage.getItem('token')) {
        axios.defaults.headers.common['Authorization'] = localStorage.getItem('token');
    }

    next()
});

export default router;

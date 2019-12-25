import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import Login from './components/auth/Login';
import Registration from './components/auth/Registration';
import Dashboard from './components/Dashboard';

const router = new Router({
    linkActiveClass: 'active',
    routes: [
        {
            path: '',
            redirect: '/login',
            component: Login
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/registration',
            name: 'Registration',
            component: Registration
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard
        }
    ]
})


export default router;
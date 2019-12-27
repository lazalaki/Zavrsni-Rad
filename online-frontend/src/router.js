import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import Login from './components/auth/Login';
import Registration from './components/auth/Registration';
import Home from './components/Home';
import Managers from './components/AllManagers'
import CreateShops from './components/auth/CreateShops'
import CreateManagers from './components/auth/CreateManagers'
import AllShops from './components/AllShops';
import Shop from './components/Shop';

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
            path: '/home',
            name: 'Home',
            component: Home
        },
        {
            path: '/managers',
            name: 'Managers',
            component: Managers
        },
        {
            path: '/shops/create',
            name: 'CreateShops',
            component: CreateShops
        },
        {
            path: '/managers/create',
            name: 'CreateManagers',
            component: CreateManagers
        },
        {
            path: '/shops',
            name: 'AllShops',
            component: AllShops
        },
        {
            path: '/shops/:id',
            name: 'Shop',
            component: Shop
        }
    ]
})


export default router;
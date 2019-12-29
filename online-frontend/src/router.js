import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import { store } from './store';

import Login from './components/auth/Login';
import Registration from './components/auth/Registration';
import Managers from './components/AllManagers'
import CreateShops from './components/auth/CreateShops'
import CreateManagers from './components/auth/CreateManagers'
import AllShops from './components/AllShops';
import Shop from './components/Shop';
import SingleManager from './components/SingleManager'
import CreateArticles from './components/auth/CreateArticles'

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
        },
        {
            path: '/managers/:id',
            name: 'SingleManager',
            component: SingleManager
        },
        {
            path: '/shops/:id/articles/create',
            name: 'CreateArticles',
            component: CreateArticles
        }
    ]
})

router.beforeEach((to, from, next) => {
    const isLoggedIn = store.getters.isLoggedIn;
    if (!isLoggedIn && to.path !== '/registration' && to.path !== '/login' && to.path !== '/shops') {
        return next({name: 'Login'})
    } else {
        next();
    }
})


export default router;
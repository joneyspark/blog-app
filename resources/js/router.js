import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import Login from './components/pages/Login.vue';
import Dashboard from './components/pages/Dashboard.vue';
import Tag from './components/admin/Tag.vue';
import Category from './components/admin/Category.vue';
import TestCom from './components/vuex/UseCom.vue';
const routes = [
    {
        path: '/',
        component: Dashboard,
    },
    {
        path: '/login',
        component: Login,
    },
    {
        path: '/testvuex',
        component: TestCom,
    },

    {
        path: '/dashboard',
        component: Dashboard,
    },
    {
        path: '/tag',
        component: Tag,
    },
    {
        path: '/category',
        component: Category,
    },

];

export default new Router({
    mode: 'history',
    routes
});

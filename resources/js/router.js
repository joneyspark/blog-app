import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import Dashboard from './components/pages/Dashboard.vue';
import Tag from './components/admin/tag.vue';
const routes = [
    {
        path: '/',
        component: Dashboard,
    },
    {
        path: '/dashboard',
        component: Dashboard,
    },

    {
        path: '/tag',
        component: Tag,
    },

];

export default new Router({
    mode: 'history',
    routes
});

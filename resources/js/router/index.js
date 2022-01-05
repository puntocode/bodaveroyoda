import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../views/Home';
import NotFound from '../views/NotFound'
import Dashboard from '../views/Dashboard';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    base: '/',
    fallback: true,
    routes: [
        {path: '/', component: Home},
        {path: '/dashboard', component: Dashboard},
        {path: '*', component: NotFound},
    ]
})

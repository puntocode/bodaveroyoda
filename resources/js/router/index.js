import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home'
import NotFound from '../views/NotFound'

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    base: '/',
    fallback: true,
    routes: [
        {path: '/', component: Home},
        // {path: '/about', component: AboutComponent},
        {path: '*', component: NotFound},
    ]
})

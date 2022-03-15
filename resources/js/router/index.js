import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../views/Home';
import Fotos from '../views/Fotos';
import NotFound from '../views/NotFound'
import Dashboard from '../views/Dashboard';
import Canciones from '../views/Canciones';
import Questions from '../views/Questions';
import Resultados from '../views/Resultados';
import CargarFotos from '../views/CargarFotos';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    base: '/',
    fallback: true,
    routes: [
        {path: '/', component: Home},
        {path: '/fotos', component: Fotos},
        {path: '/jugamos', component: Questions},
        {path: '/dashboard', component: Dashboard},
        {path: '/canciones', component: Canciones},
        {path: '/resultados', component: Resultados},
        {path: '/cargar-fotos', component: CargarFotos},
        {path: '*', component: NotFound},
    ]
})

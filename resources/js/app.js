import Vue from 'vue';
import router from './router/index';
import App from './components/App';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VAnimateCss from 'v-animate-css';


require('./bootstrap');
Vue.use(VueSweetalert2);
Vue.use(VAnimateCss);


const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});

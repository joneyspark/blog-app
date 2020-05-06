require('./bootstrap');
window.Vue = require('vue');
import router from './router';
import common from './common';
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
Vue.mixin(common);

Vue.use(ViewUI);


Vue.component('main-app', require('./components/main.vue').default);
const app = new Vue({
    el: '#app',
    router
});

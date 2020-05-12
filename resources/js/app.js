require('./bootstrap');
window.Vue = require('vue');
import router from './router';
import common from './common';
import store from './store';
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
Vue.mixin(common);

Vue.use(ViewUI);

window.Fire = new Vue();

Vue.component('admin-master', require('./components/AdminMaster.vue').default);
const app = new Vue({
    el: '#app',
    router,
    store
});

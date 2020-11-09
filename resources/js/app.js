/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import store from "./store/index"
import bsDatePicker from 'vue-bootstrap-datetimepicker'
import FullCalendar from 'vue-full-calendar';
import SweetAlert from 'vue-sweetalert2';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(FullCalendar)
Vue.use(SweetAlert);

Vue.component('Events', require('./pages/Events.vue').default);
Vue.component('DatePicker', bsDatePicker)
Vue.component('Calendar', require('./components/Calendar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    template: '<Events/>',
    store
});

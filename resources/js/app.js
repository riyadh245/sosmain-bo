require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
import {Form, HasError, AlertError} from 'vform'
import swal from 'sweetalert2'
import $ from 'jquery';
import dt from 'datatables.net';

window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', swal.stopTimer)
        toast.addEventListener('mouseleave', swal.resumeTimer)
    }
});
window.toast = toast;

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter)

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


import VueProgressBar from 'vue-progressbar'


Vue.use(VueProgressBar, {
    color: 'rgb(143,255,199)',
    failedColor: '#red',
    height: '5px',

})

Vue.component("dashboard", require("./components/Dashboard.vue").default);
Vue.component("user-management", require("./components/UserManagement.vue").default);
Vue.component("expert-management", require("./components/ExpertManagement.vue").default);
Vue.component("admin-dashboard", require("./components/AdminDashboard.vue").default);
Vue.component("center-management-expert", require("./components/CenterManagementExpert.vue").default);
Vue.component("center-management", require("./components/CenterManagement.vue").default);
Vue.component("patient-management", require("./components/PatientsManagement.vue").default);

const router = new VueRouter({
    mode: 'history',

})

window.Fire = new Vue();


const app = new Vue({
    el: "#app",
    router
})

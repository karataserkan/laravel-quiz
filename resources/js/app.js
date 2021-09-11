/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueTheMask from 'vue-the-mask'
import moment from 'moment'


import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

//window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueTheMask);

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

Vue.filter('formatDateAsBirthday', function(value) {
  if (value) {
    return moment(String(value)).format('MM/DD/YYYY')
  }
})
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
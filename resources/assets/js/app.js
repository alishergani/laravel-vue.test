
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('prop-component', require('./components/PropComponent.vue'));
Vue.component('ajax-component', require('./components/AjaxComponent.vue'));
Vue.component('linechart-component', require('./components/LineChartComponent.vue'));
Vue.component('piechart-component', require('./components/PieChartComponent.vue'));
Vue.component('randomchart-component', require('./components/RandomChartComponent.vue'));
Vue.component('socketchart-component', require('./components/SocketChartComponent.vue'));


import VueRouter from 'vue-router'
import routes from './routes.js';


Vue.use(VueRouter)

const router = new VueRouter({
  routes,
  // mode: 'history'
});


const app = new Vue({
  el: '#app',
  router: router 
});
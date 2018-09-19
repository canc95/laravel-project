
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

<<<<<<< HEAD
 Vue.component('filter-escort', require('./components/filter.vue'));
Vue.component('country-state', require('./components/countryState.vue'));
=======
Vue.component('filter-escort', require('./components/filter.vue'));
>>>>>>> 73c5981f0dd9923eb1a3d3503714328039bb99da

const app = new Vue({
    el: '#app'
});

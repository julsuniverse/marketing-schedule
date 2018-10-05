
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-base64');
require('metismenu');
require('./sb-admin-2');
require('bootstrap-datepicker');
require('datatables');
require('jquery-validation');
require('datatables-bootstrap');
require('datatables-responsive');
require('./layout.js');
require('./marketing.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';

Vue.component('marketing-input', require('./components/MarketingInput.vue'));

const app = new Vue({
    el: '#app'
});

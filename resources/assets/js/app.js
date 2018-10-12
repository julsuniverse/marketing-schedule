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

import Vue from 'vue';

Vue.component('marketing-input', require('./components/Marketing/MarketingInput.vue'));
Vue.component('marketing-color', require('./components/Marketing/MarketingColor.vue'));
Vue.component('marketing-report', require('./components/Marketing/MarketingReport.vue'));
Vue.component('keywords', require('./components/Marketing/Keywords.vue'));
Vue.component('marketing', require('./components/Marketing/Marketing.vue'));
//Vue.component('company-name', require('./components/Marketing/CompanyName.vue'));

const app = new Vue({
    el: '#app'
});

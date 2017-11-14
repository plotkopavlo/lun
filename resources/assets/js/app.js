
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./../../../node_modules/bootstrap-select/js/bootstrap-select');
// require('./jquery.simplePagination.js');

$('.selectpicker').selectpicker({
    style: 'btn-info-select'
});

// $(function() {
//
//     initPagination();
// });
//
// function initPagination(page) {
//     $(".pagination").pagination({
//         items: clientsTotal,
//         itemsOnPage: clientsOnPage,
//         currentPage: page,
//         cssStyle: 'light-theme',
//         prevText: "Назад",
//         nextText: "Вперёд",
//         onPageClick: function (pageNumber, event) {
//             updateClientsList(pageNumber);
//         }
//     });
// }




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


window.Vue = require('vue');
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.use(Vuex);

import store from './store';


//Vue.component('example', require('./components/Example.vue'));
import FlatInformation from './components/flatInformation/FlatInformation.vue';
Vue.component('apartments-list', require('./components/apartmentsList/ApartmentsList.vue'));
Vue.component('search', require('./components/search/Search.vue'));
Vue.component('flat-information', FlatInformation);
const routes = [
    { path: '/flat/:id', component: FlatInformation,  props: true},
];

const router = new VueRouter({
    routes // сокращение от `routes: routes`
});
const app = new Vue({
    el: '#app',
    store,
    router

});

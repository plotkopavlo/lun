
require('./bootstrap');
require('./../../../node_modules/bootstrap-select/js/bootstrap-select');


window.Vue = require('vue');
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.use(Vuex);

import store from './store';
import App from './App.vue'


//Vue.component('example', require('./components/Example.vue'));
import FlatInformation from './components/flatInformation/FlatInformation.vue';
import ApartmentsList from './components/apartmentsList/ApartmentsList.vue';

Vue.component('apartments-list',ApartmentsList);
Vue.component('search', require('./components/search/Search.vue'));
Vue.component('flat-information', FlatInformation);

const routes = [
    { path: '/flat/:id', component: FlatInformation,  props: true},
    { path: '/search', component: ApartmentsList,  props: true},
];

const router = new VueRouter({
    routes // сокращение от `routes: routes`
});
const app = new Vue({
    el: '#app',
    render: h => h(App),
    store,
    router,


});

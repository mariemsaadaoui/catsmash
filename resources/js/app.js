/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Vote from './components/VoteComponent.vue';
import Cats from './components/CatsComponent.vue';

const routes = [
    {
        path: '/vote',
        component: Vote
    },
    {
        path: '/cats',
        component: Cats
    }
];

const router = new VueRouter({routes});



const app = new Vue({
    el: '#app',
    router: router
});

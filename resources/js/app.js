/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'slick-carousel/slick/slick';
import 'select2';

require('./bootstrap');
require('./slickk');
require('./course-select2');
require('./filter');
require('./rateYo');
require('./review-rating');
require('./review');
require('./previewImage');


window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const menu = document.querySelector('.navbar-collapse');
const menuBtn = document.querySelector('.navbar-icons');
const overlay = document.querySelector('.overlay');

menuBtn.addEventListener('click', ()=> {
    menu.classList.toggle("overlay-open");
    overlay.classList.toggle("overlay-open");

});

overlay.addEventListener('click', ()=> {
    menu.classList.toggle("overlay-open");
    overlay.classList.toggle("overlay-open");
});


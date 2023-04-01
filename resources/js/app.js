import Alpine from 'alpinejs';
import casteaching from 'casteaching'
import Vue from 'vue/dist/vue.js'
import './bootstrap';
import VideosList from "./components/VideosList.vue";

window.Alpine = Alpine;
window.casteaching = casteaching;
window.Vue = Vue

window.Vue.component('videos-list', VideosList)
Alpine.start();

const app = new window.Vue({
    el: '#vueapp',
})

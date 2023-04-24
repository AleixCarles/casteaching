import Alpine from 'alpinejs';
import casteaching from 'casteaching'
import Vue from 'vue/dist/vue.js'
import './bootstrap';
import VideosList from "./components/VideosList.vue";
import VideoForm from "./components/VideoForm.vue";
import Status from "./components/Status.vue";

window.Alpine = Alpine;
window.casteaching = casteaching;
window.Vue = Vue

window.Vue.component('videos-list', VideosList)
window.Vue.component('video-form', VideoForm)
window.Vue.component('status', Status)
Alpine.start();

const app = new window.Vue({
    el: '#vueapp',

})

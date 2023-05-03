import './bootstrap';

import Alpine from 'alpinejs';
import Vue from 'vue/dist/vue.js';
const baseURL = import.meta.env.VITE_API_URL;
import VideosList from "./components/VideosList.vue";
import VideoForm from "./components/VideoForm.vue";
import casteaching from '@acacha/casteaching'
import Status from "./components/Status.vue";


window.Alpine = Alpine;


const api = casteaching({baseUrl: import.meta.env.VITE_API_URL});
api.setToken('szvy8FoFP7zbjcW7Qi3f7EsI7KgUtwULiggYKIzy')
window.casteaching = api;

Alpine.start();




window.Vue = Vue
window.Vue.component('videos-list', VideosList )
window.Vue.component('video-form', VideoForm )
window.Vue.component('status', Status )
// window.Vue.component('notification', Notification)

const app = new window.Vue({
    el: '#vueapp',
});

//  rn35XEX5dZmZU04MGZ2V0YXiCW2OZzfd5GykUTm9

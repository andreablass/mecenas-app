import './bootstrap';

// Uncomment if you need Alpine.js
import Alpine from 'alpinejs'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router'
// import example from './components/AlpineExample'
// Alpine.data('example', example)
window.Alpine = Alpine
 Alpine.start()

// Uncomment if you need Vue
// window.Vue = require('vue');
 //Vue.component('example', require('./components/Example.vue').default);
 //new Vue({
   // el: '#app'
 //});

 createApp(App).use(router).mount('#app')

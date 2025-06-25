import './bootstrap'
import Alpine from 'alpinejs'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router'
import '../css/app.css'
import { createPinia } from 'pinia'

// Alpine
window.Alpine = Alpine
Alpine.start()

// Vue + Pinia
const app = createApp(App)

const pinia = createPinia()

app.use(pinia)
app.use(router)

app.mount('#app')

// import example from './components/AlpineExample'
// Alpine.data('example', example)


// Uncomment if you need Vue
// window.Vue = require('vue');
 //Vue.component('example', require('./components/Example.vue').default);
 //new Vue({
   // el: '#app'
 //});


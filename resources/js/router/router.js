// resources/js/router.js
import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import Menu from '../views/Menu.vue'
import Platillos from '../views/Platillos.vue'
import Tropical from '../views/Tropical.vue'
import Especiales from '../views/Especiales.vue'
import Detox from '../views/Detox.vue'
import Clasicos from '../views/Clasicos.vue'

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/platillos', component: Platillos, name: 'Platillos' },
  { path: '/tropical', component: Tropical, name: 'Tropical' },
  { path: '/especiales', component: Especiales, name: 'Especiales' },
  { path: '/detox', component: Detox, name: 'Detox' },
  { path: '/clasicos', component: Clasicos, name: 'Clasicos' },
  { path: '/:pathMatch(.*)*', redirect: '/' }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router

// resources/js/router.js
import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import Menu from '../views/Menu.vue'
import Platillos from '../views/Platillos.vue'
import Frutales from '../views/Frutales.vue'
import Especiales from '../views/Especiales.vue'
import Detox from '../views/Detox.vue'
import Clasicos from '../views/Clasicos.vue'
import NotFound from "../views/NotFound.vue";


const routes = [
  { path: '/', component: Home, name: 'home', meta: { hideFooter: true,  hideHeader: true } },
  { path: '/platillos', component: Platillos, name: 'Platillos' },
  { path: '/frutales', component: Frutales, name: 'Frutales' },
  { path: '/especiales', component: Especiales, name: 'Especiales' },
  { path: '/detox', component: Detox, name: 'Detox' },
  { path: '/clasicos', component: Clasicos, name: 'Clasicos' },
  { path: '/:pathMatch(.*)*', component: NotFound, name: 'not-found'  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router

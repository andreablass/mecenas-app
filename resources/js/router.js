import { createRouter, createWebHistory } from 'vue-router'
import Home from './components/Home.vue'
import Menu from './components/Menu.vue'
import Recomendado from './components/Recomendado.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/menu', component: Menu },
  { path: '/recomendado', component: Recomendado },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})

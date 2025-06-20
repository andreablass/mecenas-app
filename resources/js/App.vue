<script setup>
import { useRoute } from 'vue-router'
import Footer from './components/navigation/Footer.vue'
import FooterHome from './components/navigation/FooterHome.vue'
import Header from './components/navigation/Header.vue'

const route = useRoute()
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <Header v-if="!route.meta.hideHeader" />
    <main class="pt-16 flex-1 p-4">
      <router-view />
    </main>
    <FooterHome v-if="route.name === 'home'" />
    <Footer v-else />
  </div>
</template>

<script setup>
import { useRoute } from 'vue-router'
import Footer from './components/navigation/Footer.vue'
import FooterHome from './components/navigation/FooterHome.vue'
import Header from './components/navigation/Header.vue'

const route = useRoute()
</script>

<template>
  <div class="min-h-screen flex flex-col bg-white text-black dark:bg-neutral-900 dark:text-white">
    <Header v-if="!route.meta.hideHeader" class="fixed top-0 left-0 right-0 z-10 bg-white shadow-lg p-2 h-[120px] flex justify-end items-center"/>
    <main  class="pt-[100px] flex-1 p-4">
      <router-view :key="$route.fullPath" />

    </main>
    <FooterHome v-if="route.name === 'home'" />
    <Footer v-else />
  </div>
</template>

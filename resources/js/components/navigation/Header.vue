<script setup>
import { onMounted } from 'vue'
import { logoStoreData } from '@/stores/logoStore'

const logoStore = logoStoreData()

onMounted(() => {
  logoStore.fetchLogoImage()
})
</script>

<template>
  <header class="w-full flex justify-center items-center px-4 py-2 bg-white shadow-lg fixed top-0 left-0 right-0 z-10">
    <a href="/" class="block">
      <img
        v-if="logoStore.logoImage"
        :src="logoStore.logoImage"
        alt="Logo"
        class="w-[3cm] h-[3cm] rounded-full object-contain hover:scale-105 transition-transform"
      />
      <p v-else>Cargando logo...</p>
    </a>
  </header>
</template>

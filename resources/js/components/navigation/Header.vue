<script setup>
import { onBeforeMount } from 'vue'
import { RouterLink } from 'vue-router'
import { dataPagesStore } from '@/stores/dataPagesStore'

const store = dataPagesStore()

//onBeforeMount(() => {
  //if (!store.home) {
    //store.fetchAllPages()
  //}
//})
</script>

<template>
  <header
    class="w-full flex justify-center items-center px-4 py-2 bg-white shadow-lg fixed top-0 left-0 right-0 z-10 h-[80px]"
  >
    <RouterLink to="/" class="block"><!-- en lugar de <a href="/"> directo, para evitar recargar la página completa.-->
      <img
        v-if="store.home?.logoLight"
        :src="store.home?.logoLight"
        alt="Logo"
        class="w-[3cm] h-[3cm] rounded-full object-contain hover:scale-105 transition-transform"
      />
      <p v-else class="text-gray-400 text-sm">Cargando logo...</p>
    </RouterLink>
  </header>
</template>

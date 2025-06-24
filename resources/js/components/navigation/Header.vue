<script setup>
import { ref, onMounted } from 'vue'

const headerImage = ref('')

onMounted(async () => {
  const res = await fetch('/data-header')
  const data = await res.json()
  headerImage.value = data.headerImage
})
</script>

<template>
  <header class="w-full flex justify-end items-center px-4 py-2 bg-white shadow-lg fixed top-0 left-0 right-0 z-10">
    <a href="/" class="block">
      <img
        v-if="headerImage"
        :src="headerImage"
        alt="Logo"
        class="w-[3cm] h-[3cm] rounded-full object-contain hover:scale-105 transition-transform"
      />
    </a>
  </header>
</template>

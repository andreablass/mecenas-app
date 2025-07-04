<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { dataPagesStoreStore } from '@/stores/dataPagesStore'

const store = dataPagesStoreStore()
const menuImages = ref({})

// Formatea "especiales" => "Especiales"
const formatTitle = (key) => {
  return key.charAt(0).toUpperCase() + key.slice(1)
}
onMounted(() => {
  // Solo hace fetch si no hay datos
  if (!store.clasicos.length) {
    store.fetchAllPages()
  }
})
</script>

<template>
  <footer class="sticky bottom-0 bg-gray-100 py-4 w-full">
    <div
      class="container mx-auto flex flex-nowrap justify-center gap-4 overflow-x-auto no-scrollbar px-4"
    >
      <router-link
        v-for="(src, key) in store.menuImages"
        :key="key"
        :to="'/' + key"
        class="block w-[3cm] h-[3.5cm] text-center text-xs text-gray-700 hover:text-black"
      >
        <img
          :src="src"
          :alt="key"
          class="w-full h-[3cm] object-cover rounded shadow-sm hover:scale-105 transition-transform"
        />
        <span class="block mt-1 font-medium">{{ formatTitle(key) }}</span>
      </router-link>
    </div>
  </footer>
</template>

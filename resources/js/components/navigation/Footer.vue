<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const footerItems = ref([])

onMounted(async () => {
  try {
    const res = await axios.get('/data-footer')
    footerItems.value = res.data.footerItems || []
  } catch (e) {
    console.error('Error loading footer items:', e)
  }
})
</script>

<template>
  <footer class="sticky bottom-0 bg-gray-100 py-4 w-full">
    <div
      class="container mx-auto flex flex-nowrap justify-center gap-4 overflow-x-auto no-scrollbar px-4"
    >
      <a
        v-for="item in footerItems"
        :key="item.title"
        :href="item.url"
        class="block w-[3cm] h-[3cm] overflow-hidden rounded hover:scale-105 transition-transform"
      >
        <img
          v-if="item.image"
          :src="item.image"
          :alt="item.title"
          class="w-full h-full object-contain shadow-none"
        />
        <span v-else class="text-xs block text-center mt-2">{{ item.title }}</span>
      </a>
    </div>
  </footer>
</template>

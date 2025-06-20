<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const clasicos = ref([])

onMounted(async () => {
  const res = await axios.get('/data-clasicos')
  clasicos.value = res.data.clasicos
})
</script>

<template>
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Clásicos Refrescantes</h1>

    <div v-if="clasicos.length" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
      <div
        v-for="(item, index) in clasicos"
        :key="index"
        class="bg-white shadow-md rounded p-4"
      >
        <img
          v-if="item.image"
          :src="item.image"
          :alt="item.title"
          class="w-full h-40 object-cover rounded mb-4"
        />
        <h2 class="text-xl font-semibold mb-2">{{ item.title }}</h2>
        <p class="text-gray-700">{{ item.text }}</p>
      </div>
    </div>

    <p v-else class="text-center text-gray-500">No hay jugos clásicos disponibles aún.</p>
  </div>
</template>

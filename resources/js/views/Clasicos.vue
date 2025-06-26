<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const data = ref(null)

onMounted(async () => {
  const res = await axios.get('/blassandrea/data/clasicosPage')
  data.value = res.data
})
</script>

<template>
  <div v-if="data" class="max-w-3xl mx-auto p-4">
    <!-- Título -->
    <h1 class="text-4xl font-bold mb-6 text-center">{{ data.title }}</h1>

    <!-- Imagen -->
    <div class="flex justify-center mb-6">
      <img
        v-if="data.imagen"
        :src="data.imagen"
        alt="Imagen del vaso"
        class="w-60 h-60 object-cover rounded-xl shadow-lg"
      />
    </div>

    <!-- Precio -->
    <div class="text-center mb-6">
      <p class="text-2xl font-semibold">Precio: MXN ${{ data.precio }}</p>
    </div>

    <!-- Ingredientes -->
    <div class="mb-6">
      <h2 class="text-2xl font-bold mb-2">Ingredientes</h2>
      <p class="text-lg">{{ data.ingredientes }}</p>
    </div>

    <!-- Descriptores -->
    <div v-if="data.descriptores.length" class="mb-6">
      <h2 class="text-2xl font-bold mb-2">Descriptores de sabor</h2>
      <div class="flex flex-wrap gap-2">
        <span
          v-for="tag in data.descriptores"
          :key="tag"
          class="px-3 py-1 bg-yellow-200 rounded-full text-sm font-medium"
        >
          {{ tag }}
        </span>
      </div>
    </div>
  </div>
</template>

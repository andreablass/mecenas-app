<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import { dataPagesStore } from '@/stores/dataPagesStore'

const route = useRoute()
const store = dataPagesStore()

// Recolecta todas las categorías
const todosLosJugos = [
  ...store.clasicos,
  ...store.especiales,
  ...store.detox,
  ...store.frutales,
  ...store.platillos
]

// Obtiene las preferencias desde query params
const preferencias = JSON.parse(route.query.respuestas)

// Aplanar todas las respuestas en un solo array de tags
const tagsSeleccionados = [
  ...preferencias.bebida,
  ...preferencias.sabores,
  ...preferencias.estilo
]

// Filtrar jugos con coincidencias
const recomendaciones = computed(() => {
  return todosLosJugos.filter(jugo => {
    const jugoTags = jugo.descriptores || jugo.lista || []
    return tagsSeleccionados.some(tag => jugoTags.includes(tag))
  })
})
</script>

<template>
  <div class="max-w-4xl mx-auto p-4 space-y-6">
    <h1 class="text-3xl font-bold text-center mb-6">Tus Recomendaciones 🍹</h1>
    <div v-if="recomendaciones.length" class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div
        v-for="jugo in recomendaciones"
        :key="jugo.slug"
        class="border rounded-lg p-4 shadow hover:shadow-lg transition"
      >
        <img :src="jugo.imagen" alt="" class="rounded mb-4">
        <h2 class="text-xl font-semibold">{{ jugo.title }}</h2>
        <p class="text-sm text-gray-600">{{ jugo.descripcion }}</p>
        <p class="text-green-700 font-bold mt-2">$ {{ jugo.precio }}</p>
      </div>
    </div>
    <div v-else class="text-center text-gray-500">
      No encontramos jugos con esas preferencias 😢
    </div>
  </div>
</template>


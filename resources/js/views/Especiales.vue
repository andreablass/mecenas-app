<script setup>
import { ref, onBeforeMount } from 'vue'
import axios from 'axios'
import { dataPagesStore } from '@/stores/dataPagesStore'
import IngredientesModal from '@/components/IngredientesModal.vue'

const store = dataPagesStore()
const showModal = ref(false)
const selectedItem = ref(null) // guarda el jugo seleccionado
onBeforeMount(() => {
  // Solo hace fetch si no hay datos
  if (!store.especiales.length) {
    store.fetchAllPages()
  }
})

// Abrir modal con datos del jugo seleccionado
function openModal(item) {
  selectedItem.value = item
  showModal.value = true
}
</script>

<template>
  <div class="w-full flex justify-center px-4">
    <div class="w-full max-w-7xl py-10">
      <!-- Título principal -->
      <h1 class="text-5xl font-extrabold text-yellow-800 mb-10">Especiales</h1>

      <!-- Bloques de cada producto -->
      <div v-for="(item, index) in store.especiales" :key="item.title" :class="index !== 0 ? 'border-t border-yellow-200 pt-6' : ''" class="pb-6">
        <!-- Nombre y Precio -->
        <div class="flex justify-between items-center mb-4">
          <button @click="openModal(item)" class="">
            <div class="text-yellow-800 font-extrabold text-3xl">
              {{ item.title }}
            </div>
          </button>

          <div class="text-yellow-800 font-bold text-lg">${{ item.precio }}</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal dinámico -->
  <IngredientesModal
    v-model="showModal"
    v-if="selectedItem"
    :title="selectedItem.title"
    :descripcion="selectedItem.descripcion"
    :sugerencia="selectedItem.sugerencia"
    :imagen="selectedItem.imagen"
  />
</template>

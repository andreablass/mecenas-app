<script setup>
import { modalStoreData } from '@/stores/modalIngredientes'
const { isOpen, data, closeModal } = modalStoreData()

</script>

<template>
  <div
    v-if="isOpen"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm"
  >
    <div class="bg-white dark:bg-neutral-900 text-black dark:text-white p-6 rounded-2xl shadow-xl max-w-lg w-full relative">
      <button @click="closeModal" class="absolute top-2 right-3 text-xl">&times;</button>

      <h2 class="text-2xl font-bold mb-4">{{ data.title }}</h2>

      <div class="mb-3">
        <h3 class="font-semibold mb-1">Descripción:</h3>
        <p class="text-sm">{{ data.descripcion }}</p>
      </div>

      <div v-if="data.lista" class="mb-3">
        <h3 class="font-semibold mb-1">Lista de ingredientes:</h3>
        <p class="text-sm">{{ data.lista }}</p>
      </div>

      <div v-if="data.sugerencia" class="mb-3">
        <h3 class="font-semibold mb-1">Sugerencia:</h3>
        <p class="text-sm">{{ data.sugerencia }}</p>
      </div>
    </div>
  </div>
</template>


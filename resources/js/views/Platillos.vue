<script setup>
import { onBeforeMount } from 'vue'
import { dataPagesStore } from '@/stores/dataPagesStore'

const store = dataPagesStore()

onBeforeMount(() => {
  // Solo hace fetch si aún no hay datos
  if (!store.platillos.length) {
    store.fetchAllPages()
  }
})
</script>

<template>
  <div class="w-full flex justify-center px-4">
    <div class="w-full max-w-7xl py-10">
      <!-- Título principal -->
      <h1 class="text-5xl font-extrabold text-yellow-800 mb-10">
        Platillos
      </h1>

      <!-- Bloques de cada producto -->
      <div
        v-for="(item, index) in store.platillos"
        :key="item.title"
        :class="index !== 0 ? 'border-t border-yellow-200 pt-6' : ''"
        class="pb-6"
      >
        <!-- Nombre y Precio -->
        <div class="flex justify-between items-center mb-4">
          <div class="text-yellow-800 font-extrabold text-3xl">
            {{ item.title }}
          </div>
          <div class="text-yellow-800 font-bold text-lg">
            ${{ item.precio }}
          </div>
        </div>

        <p class="text-gray-700 mb-2">{{ item.descripcion }}</p>
        <img
          v-if="item.imagen"
          :src="item.imagen"
          :alt="item.title"
          class="w-full max-w-md rounded-lg shadow-md"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import { useModalStore } from '../stores/useModalIngredientes'
const { isOpen, data, closeModal } = useModalStore()
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
        <div class="text-sm leading-snug" v-html="data.ingredientes"></div>
      </div>
    </div>
  </div>
</template>

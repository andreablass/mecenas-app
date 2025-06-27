<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const data = ref(null)

onMounted(async () => {
  const res = await axios.get('blassandrea/data/detoxPage')
  data.value = res.data
})
</script>

<template>
  <div class="w-full flex justify-center px-4">
    <div class="w-full max-w-7xl py-10">
      <!-- Título principal -->
      <h1 class="text-5xl font-extrabold text-yellow-800 mb-10">
        Detox
      </h1>

      <!-- Bloques de cada producto -->
      <div
        v-for="(item, index) in data"
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

        <!-- Puedes agregar más info aquí -->
      </div>
    </div>
  </div>
</template>

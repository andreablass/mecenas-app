<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const data = ref(null)

onMounted(async () => {
  const res = await axios.get('/blassandrea/data/especialesPage')
  data.value = res.data
})
</script>

<template>
  <div v-if="data" class="max-w-3xl mx-auto p-4">
    <h1 class="text-4xl font-bold mb-6 text-center">{{ data.title }}</h1>

    <ul class="space-y-4">
      <li
        v-for="item in data.destilados"
        :key="item.nombre"
        class="flex justify-between border-b pb-2"
      >
        <span class="font-medium">{{ item.nombre }}</span>
        <span class="font-semibold">MXN ${{ item.precio }}</span>
      </li>
    </ul>
  </div>
</template>

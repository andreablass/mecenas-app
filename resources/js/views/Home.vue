<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const data = ref(null)

onMounted(async () => {
  const res = await axios.get('/api/home')
  data.value = res.data
})
</script>

<template>
  <div v-if="data" class="p-6">
    <div class="text-center">
      <img :src="data.mainImageLight" alt="Imagen" class="w-40 h-40 mx-auto" />
      <img :src="data.logoLight" alt="Logo" class="w-80 mx-auto mt-4" />
    </div>

    <p class="mt-4 text-xl text-center" v-html="data.description"></p>

    <div class="mt-6 flex justify-center gap-4">
      <a :href="data.menuButtonLink" class="px-6 py-3 border">
        {{ data.menuButtonText }}
      </a>
      <a :href="data.reservasionesButtonLink" class="px-6 py-3 border">
        {{ data.reservasionesButtonText }}
      </a>
    </div>

    <div class="mt-6 text-center">
      <h2 class="text-2xl font-bold">Horario</h2>
      <ul>
        <li v-for="item in data.schedule" :key="item.day">
          {{ item.day }}: {{ item.hours }}
        </li>
      </ul>
    </div>

    <div class="mt-6 text-center">
      <h2 class="text-2xl font-bold">Ubicación</h2>
      <p>{{ data.location }}</p>
    </div>

    <div class="mt-6 text-center">
      <h2 class="text-2xl font-bold">Síguenos</h2>
      <div class="flex justify-center gap-4 text-2xl">
        <a v-for="s in data.social" :href="s.link" target="_blank" :key="s.icon">
          <i :class="`fab fa-${s.icon}`"></i>
        </a>
      </div>
    </div>
  </div>
</template>

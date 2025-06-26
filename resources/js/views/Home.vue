<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { RouterLink } from 'vue-router'
import { useLogoStore } from '@/stores/useLogoStore'

const logoStore = useLogoStore()
const data = ref(null)

onMounted(async () => {
  const res = await axios.get('/blassandrea/data/home')
  data.value = res.data
  logoStore.fetchLogoImage()
})
</script>

<template>
  <div v-if="data" class="p-4 max-w-4xl mx-auto mt-8">
    <!-- Contenedor imágenes principal -->
    <div class="flex flex-col items-center mb-8">
      <img v-if="data.mainImageLight" :src="data.mainImageLight" alt="Imagen principal" class="max-w-[150px] h-auto object-contain" />
      <img v-if="logoStore.logoImage" :src="logoStore.logoImage" alt="Logo" class="max-w-[120px] h-auto object-contain" />
      <img v-if="data.nameImage" :src="data.nameImage" alt="Imagen del Nombre" class="max-w-[250px] h-auto object-contain" />
    </div>

    <!-- Descripción -->
    <div class="mx-auto px-4 w-full sm:w-3/4 md:w-1/2">
      <p class="text-center text-xl break-words" v-html="data.description"></p>
    </div>

    <!-- Botones -->
    <div class="flex justify-center gap-4">
      <!-- Botón 1: Transparente con borde negro -->
      <RouterLink :to="{ name: 'Especiales' }">
        <button class="px-10 py-4 border-2 border-black text-black rounded-full text-lg font-semibold hover:bg-black hover:text-white transition">
          {{ data.menuButtonText || 'Menú' }}
        </button>
      </RouterLink>

      <!-- Botón 2: Fondo negro, texto blanco -->

      <button class="px-10 py-4 bg-black text-white rounded-full text-lg font-semibold hover:bg-neutral-800 transition">
        Reservar
      </button>
    </div>

    <!-- Horario -->
    <div class="text-center mb-8">
      <h2 class="text-2xl font-bold mb-2">Horario</h2>
      <ul>
        <li v-for="item in data.schedule" :key="item.day" class="capitalize">{{ item.day }}: {{ item.hours }}</li>
      </ul>
    </div>

    <!-- Ubicación -->
    <div class="text-center mb-8">
      <h2 class="text-2xl font-bold mb-2">Ubicación</h2>
      <p>{{ data.location }}</p>
    </div>

    <!-- Redes sociales -->
    <div class="text-center">
      <h2 class="text-2xl font-bold mb-2">Síguenos</h2>
      <div class="flex justify-center gap-6 text-2xl">
        <a v-for="s in data.social" :href="s.link" target="_blank" rel="noopener noreferrer" :key="s.icon" class="hover:text-blue-600">
          <i :class="`fab fa-${s.icon}`"></i>
        </a>
      </div>
    </div>
  </div>
</template>

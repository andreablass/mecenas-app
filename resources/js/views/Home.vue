<script setup>
import { onBeforeMount } from 'vue'
import { RouterLink } from 'vue-router'
import { dataPagesStore } from '@/stores/dataPagesStore'

const store = dataPagesStore()

onBeforeMount(() => {
  // Solo hace fetch si aún no hay datos
  if (!store.home) {
    store.fetchAllPages()
  }
})
</script>

<template>
  <div
    v-if="store.home"
    class="flex flex-col items-center justify-center min-h-screen max-w-4xl mx-auto p-4"
  >
    <!-- Contenedor imágenes principal -->
    <div class="flex flex-col items-center mb-8">
      <img
        v-if="store.home.mainImageLight"
        :src="store.home.mainImageLight"
        alt="Imagen principal"
        class="max-w-[150px] h-auto object-contain"
      />
      <img
        v-if="store.home.logoLight"
        :src="store.home.logoLight"
        alt="Logo"
        class="max-w-[120px] h-auto object-contain"
      />
      <img
        v-if="store.home.nameImage"
        :src="store.home.nameImage"
        alt="Imagen del Nombre"
        class="max-w-[250px] h-auto object-contain"
      />
    </div>

    <!-- Descripción -->
    <div class="mx-auto px-4 w-full sm:w-3/4 md:w-1/2">
      <p class="text-center text-xl break-words" v-html="store.home.description"></p>
    </div>


    <!-- Botones -->
    <div class="flex justify-center gap-4">
      <!-- Botón 1: Transparente con borde negro -->
      <RouterLink :to="{ name: 'Clasicos' }">
        <button class="px-10 py-4 border-2 border-black text-black rounded-full text-lg font-semibold hover:bg-black hover:text-white transition">
          {{ store
          .menuButtonText || 'Menú' }}
        </button>
      </RouterLink>

      <!-- Botón 2: Fondo negro, texto blanco -->
      <RouterLink :to="{ name: 'Especiales' }">
        <button class="px-10 py-4 border-2 border-black text-black rounded-full text-lg font-semibold hover:bg-black hover:text-white transition">
          {{ store
          .reservasionesButtonText || 'Reservaciones' }}
        </button>
      </RouterLink>
    </div>

    <!-- Horario -->
    <div class="text-center mb-8 mt-8">
      <h2 class="text-2xl font-bold mb-2">Horario</h2>
      <ul>
        <li
          v-for="item in store.home.schedule"
          :key="item.day"
          class="capitalize"
        >
          {{ item.day }}: {{ item.hours }}
        </li>
      </ul>
    </div>

    <!-- Ubicación -->
    <div class="text-center mb-8">
      <h2 class="text-2xl font-bold mb-2">Ubicación</h2>
      <p>{{ store.home.location }}</p>
    </div>

    <!-- Redes sociales -->
    <div class="text-center">
      <h2 class="text-2xl font-bold mb-2">Síguenos</h2>
      <div
        v-if="store.home.social?.length"
        class="flex justify-center gap-6 text-3xl"
      >
        <a
          v-for="s in store.home.social"
          :key="s.icon"
          :href="s.link"
          target="_blank"
          rel="noopener noreferrer"
          class="hover:text-blue-600 transition"
        >
          <i :class="`fab fa-${s.icon}`"></i>
        </a>
      </div>
    </div>
  </div>
</template>

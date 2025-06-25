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
  <div v-if="data" class="p-6 max-w-4xl mx-auto">
    <div class="text-center">
      <div class="text-center">
        <img
          v-if="data.mainImageLight"
          :src="data.mainImageLight"
          alt="Imagen principal"
          class="block w-[3cm] h-[3cm] overflow-hidden rounded hover:scale-105-auto mx-auto object-contain"
        />
        <img
          v-if="logoStore.logoImage"
          :src="logoStore.logoImage"
          alt="Logo"
          class="block w-[3cm] h-[3cm] rounded mx-auto mt-4 object-contain hover:scale-105 transition-transform"
        />
      </div>
    </div>

    <p class="mt-4 text-xl text-center" v-html="data.description"></p>

    <div class="mt-6 flex justify-center gap-4">
      <div class="mt-6 flex justify-center gap-4">
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-2 rounded-full shadow">
          <RouterLink :to="{ name: 'Especiales' }">
            {{ data.menuButtonText || 'Menú' }}
          </RouterLink>
        </button>

        <a v-if="data.reservasionesButtonLink" :href="data.reservasionesButtonLink" class="px-6 py-3 border rounded hover:bg-gray-100">
          {{ data.reservasionesButtonText || 'Reservar Ahora' }}
        </a>
      </div>

      <a v-if="data.reservasionesButtonLink" :href="data.reservasionesButtonLink" class="px-6 py-3 border rounded hover:bg-gray-100">
        {{ data.reservasionesButtonText || 'Reservar Ahora' }}
      </a>
    </div>

    <div class="mt-6 text-center">
      <h2 class="text-2xl font-bold mb-2">Horario</h2>
      <ul>
        <li v-for="item in data.schedule" :key="item.day" class="capitalize">{{ item.day }}: {{ item.hours }}</li>
      </ul>
    </div>

    <div class="mt-6 text-center">
      <h2 class="text-2xl font-bold mb-2">Ubicación</h2>
      <p>{{ data.location }}</p>
    </div>

    <div class="mt-6 text-center">
      <h2 class="text-2xl font-bold mb-2">Síguenos</h2>
      <div class="flex justify-center gap-6 text-2xl">
        <a v-for="s in data.social" :href="s.link" target="_blank" rel="noopener noreferrer" :key="s.icon" class="hover:text-blue-600">
          <i :class="`fab fa-${s.icon}`"></i>
        </a>
      </div>
    </div>
  </div>
</template>

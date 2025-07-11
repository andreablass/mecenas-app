<script setup>
import { ref } from 'vue'
import { dataPagesStore } from '@/stores/dataPagesStore'

const store = dataPagesStore()

// Opciones para preguntas
const opciones = {
  bebida: ['Dulce', 'Ácido', 'Amargo', 'Simple', 'Suave', 'Fuerte'],
  sabores: ['Afrutados', 'Secos', 'Tropicales'],
  estilo: ['Ligero', 'Muy dulce', 'Simple']
}

// Respuestas del usuario (local)
const respuestas = ref({
  bebida: [],
  sabores: [],
  estilo: []
})

// Estado para saber si mostrar preguntas o resultados
const mostrarResultados = ref(false)

function enviarRespuestas() {
  // Guardar en store (opcional)
  store.respuestas = respuestas.value
  // Cambiar estado para mostrar resultados
  mostrarResultados.value = true
}
</script>

<template>
 <!--s <div
    v-if="store.backgrounds?.recomendaciones"
    class="min-h-screen bg-cover bg-center p-8"
    :style="`background-image: url(${store.backgrounds.recomendaciones});`"
  > -->
    <div class="max-w-xl mx-auto bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
      <h1 class="text-3xl font-bold text-yellow-800 mb-6 text-center">Tus Recomendaciones 🍹</h1>

      <template v-if="!mostrarResultados">
        <!-- Preguntas -->
        <div class="space-y-6">
          <div>
            <h2 class="font-semibold mb-2">¿Cómo prefieres tu bebida?</h2>
            <div class="flex flex-wrap gap-2">
              <label v-for="op in opciones.bebida" :key="op" class="cursor-pointer px-3 py-1 border rounded-full select-none" :class="{ 'bg-yellow-300': respuestas.bebida.includes(op) }">
                <input type="checkbox" :value="op" v-model="respuestas.bebida" class="hidden" />
                {{ op }}
              </label>
            </div>
          </div>

          <div>
            <h2 class="font-semibold mb-2">¿Qué sabores prefieres?</h2>
            <div class="flex flex-wrap gap-2">
              <label v-for="op in opciones.sabores" :key="op" class="cursor-pointer px-3 py-1 border rounded-full select-none" :class="{ 'bg-yellow-300': respuestas.sabores.includes(op) }">
                <input type="checkbox" :value="op" v-model="respuestas.sabores" class="hidden" />
                {{ op }}
              </label>
            </div>
          </div>

          <div>
            <h2 class="font-semibold mb-2">¿Cómo te gusta el jugo?</h2>
            <div class="flex flex-wrap gap-2">
              <label v-for="op in opciones.estilo" :key="op" class="cursor-pointer px-3 py-1 border rounded-full select-none" :class="{ 'bg-yellow-300': respuestas.estilo.includes(op) }">
                <input type="checkbox" :value="op" v-model="respuestas.estilo" class="hidden" />
                {{ op }}
              </label>
            </div>
          </div>

          <button
            @click="enviarRespuestas"
            class="mt-6 w-full py-3 bg-yellow-500 text-white font-bold rounded-full hover:bg-yellow-600 transition"
          >
            Recomiéndame
          </button>
        </div>
      </template>
    </div>
  <!--</div>-->
</template>


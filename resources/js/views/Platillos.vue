<script setup>
// Puedes dejar esto vacío si aún no tienes lógica.
import axios from 'axios'

const data = ref(null)

onMounted(async () => {
  const res = await axios.get('platillos')
  data.value = res.data
})
</script>

<template>
  <div class="border rounded-xl p-4 shadow-md">
    <h2 class="text-lg font-semibold">Platillos para compañar</h2>
    <p class="text-sm text-gray-600">Este es un bloque de recomendación dentro de un componente.</p>
  </div>
</template>
<script setup>
const visible = defineModel()

const props = defineProps({
  title: String,
  descripcion: String,
  sugerencia: String,
  imagen: String,
})
</script>

<template>
  <Transition
    enter-active-class="ease-in-out duration-200"
    enter-from-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="ease-in-out duration-200"
    leave-from-class="opacity-100"
    leave-to-class="opacity-0"
  >
    <div v-if="visible" class="fixed inset-0 z-50 grid place-items-center bg-pink-500/50 backdrop-blur-sm">
      <div class="" @click="visible = false"></div>

      <div class="absolute w-4/5 md:w-1/2 left-1/2 top-1/2  -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg p-6 grid gap-4 shadow-2xl">
        <!-- Imagen
        <img
          v-if="imagen"
          :src="imagen"
          alt="Imagen del jugo"
          class="rounded-xl mx-auto max-h-60 object-cover"
        /> -->

        <!-- Título -->
        <header class="text-2xl font-bold text-center ">
          {{ title }}
        </header>

        <!-- Descripción -->
        <main class="text-gray-700 text-base text-center">
          {{ descripcion }}
        </main>

        <!-- Sugerencia -->
        <footer v-if="sugerencia" class="mt-4 text-sm  text-center italic">
          {{ sugerencia }}
        </footer>
      </div>
    </div>
  </Transition>
</template>

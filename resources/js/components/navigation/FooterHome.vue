<script setup>
const year = new Date().getFullYear()
</script>

<template>
  <footer
    class="
      w-full
      bg-white
      py-4
      border-gray-200
      flex
      justify-center
      items-center
      sticky
      bottom-0
      left-0
    "
  >
    <p class="text-sm text-gray-600">&copy; {{ year }}. JugoLab. Todos los derechos reservados.</p>
  </footer>
</template>

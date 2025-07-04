<script setup>
import { onMounted } from 'vue'
import { dataPagesStoreStore } from '@/stores/dataPagesStore'

const store = dataPagesStoreStore()

onMounted(() => {
  // Solo hace fetch si no hay datos
  if (!store.clasicos.length) {
    store.fetchAllPages()
  }
})
</script>

<template>
  <div class="flex justify-center items-start mt-4">
    <div class="flex flex-col gap-10">
      <div
        v-for="item in store.clasicos"
        :key="item.title"
        class="flex items-center gap-10 rounded-2xl shadow-lg p-6"
      >
        <div>
          <img
            v-if="item.imagen"
            :src="item.imagen"
            alt="Imagen del vaso"
            class="max-w-[180px] h-auto object-cover rounded-2xl shadow-md"
            loading="lazy"
          />
        </div>

        <div class="flex flex-col justify-center">
          <div class="text-yellow-800 font-extrabold text-4xl mb-1">
            {{ item.title }}
          </div>

          <button
            
            class="text-sm text-blue-600 underline mb-2"
          >
            Ver ingredientes
          </button>

          <div
            v-if="item.descriptores && item.descriptores.length"
            class="flex flex-wrap gap-2 mb-3"
          >
            <span
              v-for="tag in item.descriptores"
              :key="tag"
              class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-0.5 rounded-full"
            >
              {{ tag }}
            </span>
          </div>

          <div class="text-yellow-800 font-bold text-xs">
            Precio: MXN ${{ item.precio }}
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

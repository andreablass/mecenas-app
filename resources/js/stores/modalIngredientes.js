import { defineStore } from 'pinia'
import { ref } from 'vue'

export const modalStoreData = defineStore('modal', () => {
  const isOpen = ref(false)
  const data = ref({
    title: '',
    ingredientes: '',
    sugerencia: '',
  })

  function openModal(payload) {
    data.value = payload
    isOpen.value = true
  }

  function closeModal() {
    isOpen.value = false
    data.value = {
      title: '',
      ingredientes: '',
      sugerencia: '',
    }
  }

  return { isOpen, data, openModal, closeModal }
})

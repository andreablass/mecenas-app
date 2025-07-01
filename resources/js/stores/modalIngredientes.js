import { defineStore } from 'pinia'
import { ref } from 'vue'

export const modalStoreData = defineStore('modalIngredientes', () => {
  const isOpen = ref(false)
  const data = ref({
    title: '',
    descripcion: '',
    sugerencia: '',
    lista: ''
  })

  function openModal(payload) {
    data.value = payload
    isOpen.value = true
  }

  function closeModal() {
    isOpen.value = false
    data.value = {
      title: '',
      descripcion: '',
      sugerencia: '',
      lista: ''
    }
  }

  return { isOpen, data, openModal, closeModal }
})

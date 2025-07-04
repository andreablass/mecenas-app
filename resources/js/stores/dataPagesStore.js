// stores/useJugosStore.js
import { defineStore } from 'pinia'
import { ref } from 'vue'
import axios from 'axios'

export const dataPagesStore = defineStore('jugos', () => {
  const clasicos = ref([])
  const especiales = ref([])
  const detox = ref([])
  const frutales = ref([])
  const platillos = ref([])
  const home = ref(null)
  const backgrounds = ref(null)
  const loading = ref(false)
  const error = ref(null)

  async function fetchAllPages() {
    loading.value = true
    error.value = null
    try {
      const res = await axios.get('/blassandrea/data/pages')
      clasicos.value = res.data.clasicos
      especiales.value = res.data.especiales
      detox.value = res.data.detox
      frutales.value = res.data.frutales
      platillos.value = res.data.platillos
      home.value = res.data.home
      backgrounds.value = res.data.backgrounds
    } catch (err) {
      error.value = err
    } finally {
      loading.value = false
    }
  }

  return {
    clasicos,
    especiales,
    detox,
    frutales,
    platillos,
    home,
    backgrounds,
    loading,
    error,
    fetchAllPages
  }
})

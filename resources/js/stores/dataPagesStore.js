import { defineStore } from 'pinia'

export const dataPagesStore = defineStore('jugos', {
  // 💾 STATE: Aquí guardamos toda la data que viene desde Blade
  state: () => ({
    data: window.app || {}, // 👈 Agarra los datos inyectados desde Blade
    loading: false,
    error: null,
    respuestas: {
      bebida: [],
      sabores: [],
      estilo: []
    }
  }),

  //  GETTERS: Computed properties (puedes hacer filtros o derivados)
  getters: {
    clasicos: (state) => state.data.clasicos || [],
    especiales: (state) => state.data.especiales || [],
    detox: (state) => state.data.detox || [],
    frutales: (state) => state.data.frutales || [],
    platillos: (state) => state.data.platillos || [],
    home: (state) => state.data.home || {},
    backgrounds: (state) => state.data.backgrounds || {}
  },

  //  ACTIONS: Métodos para cambiar el estado o hacer llamadas API
  actions: {
    //  Actualiza respuestas del quiz
    setRespuestas(data) {
      this.respuestas = data
    },

    //  Si necesitas volver a cargar datos desde API
    async fetchAllPages() {
      this.loading = true
      this.error = null
      try {
        const response = await axios.get('/blassandrea/data/pages')
        this.data = response.data
      } catch (err) {
        this.error = err
      } finally {
        this.loading = false
      }
    }
  }
})

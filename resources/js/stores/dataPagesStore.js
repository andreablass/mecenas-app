import { defineStore } from 'pinia'
import { ref } from 'vue'
import axios from 'axios'

export const dataPagesStore = defineStore('jugos', () => {
  state: () => ({ data: window.app})

})

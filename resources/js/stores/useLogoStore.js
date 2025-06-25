import { defineStore } from 'pinia'
import axios from 'axios'

import { readonly, ref } from 'vue'

export const useLogoStore = defineStore('logo', () => {
  const logoImage = ref(null)

  function setLogoImage(url) {
    logoImage.value = url
  }

  async function fetchLogoImage() {
    const res = await fetch('/blassandrea/header/logo')
    const data = await res.json()
    setLogoImage(data.logoImage)
  }

  return {
    logoImage: readonly(logoImage),
    fetchLogoImage
  }
})

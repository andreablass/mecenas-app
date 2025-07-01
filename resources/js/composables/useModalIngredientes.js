import { modalStoreData } from '@/stores/modalIngredientes'

export function useOpenIngredientes() {
  const modal = modalStoreData()

  function openIngredientes(item) {
    modal.openModal({
      title: item.title,
      descripcion: item.descripcion,
      sugerencia: item.sugerencia
    })
  }

  return { openIngredientes }
}

import { modalStoreData } from '@/stores/modalIngredientes'

export function useOpenIngredientes() {
  const modal = modalStoreData()

  function openIngredientes(item) {
    modal.openModal({
      title: item.title,
      ingredientes: item.ingredientes.lista,
      sugerencia: item.ingredientes.sugerencia,
    })
  }
  

  return { openIngredientes }
}



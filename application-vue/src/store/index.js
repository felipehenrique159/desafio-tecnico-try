import { createStore } from 'vuex'

export default createStore({
  state: {
    vendedores : []
  },
  mutations: {
    storeVendedores(state, data) {
      state.vendedores = data
    }
  },
  actions: {
  },
  modules: {
  }
})

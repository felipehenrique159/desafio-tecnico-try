import { createStore } from 'vuex'
import api from '../Services/Api';

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
    async buscarTodosVendedoresComComissao() {
      try {
        let vendedores = await api.get('api/vendedor');
        if (vendedores.data.length > 0) {
          this.state.vendedores = vendedores.data
        }
      } catch (error) {
        console.error('Erro ao buscar vendedores:', error);
      }
    }
  },
  modules: {
  }
})

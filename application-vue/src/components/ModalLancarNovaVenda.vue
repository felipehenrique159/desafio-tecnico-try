<template>
<div class="container">
  <div class="modal fade" id="modalLancarNovaVenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Venda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="lancarVenda">
            <div class="form-group">
              <label for="nome">Vendedor:</label>
              <select class="form-control" v-model="idVendedor" required>
                <option value="">-- Selecione um vendedor --</option>
                <option v-for="item in this.$store.state.vendedores" :key="item.id" :value="item.id">{{ item.nome }} - {{ item.email }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Valor da venda:</label>
              <input v-model="valorVenda" type="number" class="form-control" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" @click="lancarVenda">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import api from '../Services/Api'
import tratarMensagensErro from '../utils/errosValidacao';

export default {
  data() {
      return {
        idVendedor: null,
        valorVenda: null
      };
  },
  methods: {
    async lancarVenda() {
      try {
        await api.post('api/vendas', {
          id_vendedor : this.idVendedor,
          valor_da_venda : this.valorVenda
        })
      } catch (error) {
        tratarMensagensErro(error)
      }
    }
  }
}
</script>

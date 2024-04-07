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
              <label>Vendedor:</label>
              <select class="form-control" v-model="idVendedor" required>
                <option value="">-- Selecione um vendedor --</option>
                <option v-for="item in this.$store.state.vendedores" :key="item.id" :value="item.id">{{ item.nome }} - {{ item.email }}</option>
              </select>
            </div>
            <div class="form-group">
              <label>Valor da venda:</label>
              <input v-model.lazy="valorVenda" v-money="money" type="text" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
      </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import {VMoney} from 'v-money'
import api from '../Services/Api'
import tratarMensagensErro from '../utils/errosValidacao';
import Swal from 'sweetalert2';
import { mapActions } from 'vuex';

export default {
  data() {
      return {
        idVendedor: null,
        valorVenda: null,
        money: {
          decimal: '.',
          thousands: ',',
          precision: 2,
          masked: false
        }
      };
  },
  methods: {
    ...mapActions(['buscarTodosVendedoresComComissao']),
    async lancarVenda() {
      try {
        await api.post('api/vendas', {
          id_vendedor : this.idVendedor,
          valor_da_venda : this.valorVenda.replace(',', '')
        })

        Swal.fire({
          title: "Cadastrada com sucesso!",
          text: "Venda cadastrada com sucesso!",
          icon: "success"
        }).then((result) => {
          if (result.isConfirmed) {
            this.buscarTodosVendedoresComComissao();
            this.idVendedor = null,
            this.valorVenda = null
          }
        });

      } catch (error) {
        tratarMensagensErro(error)
      }
    }
  },
  directives: {
    money: VMoney
  }
}
</script>

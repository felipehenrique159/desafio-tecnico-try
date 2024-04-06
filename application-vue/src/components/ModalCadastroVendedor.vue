<template>
<div class="container">
  <div class="modal fade" id="modalCadastroVendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Vendedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="salvarVendedor">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="nome" v-model="nome" required>
            </div>
            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" id="email" v-model="email" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" @click="salvarVendedor">Salvar</button>
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
        nome: '',
        email: ''
      };
  },
  methods: {
    async salvarVendedor() {

      const vendedor = {
          nome : this.nome,
          email : this.email
      }

      try {
        await api.post('api/vendedor', vendedor)
      } catch (error) {
        tratarMensagensErro(error)
      }
    }
  },
}
</script>

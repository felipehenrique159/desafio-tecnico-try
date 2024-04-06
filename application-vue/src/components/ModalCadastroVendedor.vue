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
import api from '../Services/Api'
import tratarMensagensErro from '../utils/errosValidacao';
import Swal from 'sweetalert2';
import { mapActions } from 'vuex';

export default {
  data() {
      return {
        nome: '',
        email: ''
      };
  },
  methods: {
    ...mapActions(['buscarTodosVendedoresComComissao']),
    async salvarVendedor() {
      const vendedor = {
          nome : this.nome,
          email : this.email
      }

      try {
        await api.post('api/vendedor', vendedor)

        Swal.fire({
          title: "Cadastrado com sucesso!",
          text: "Vendedor cadastrado com sucesso!",
          icon: "success"
        }).then((result) => {
          if (result.isConfirmed) {
            this.buscarTodosVendedoresComComissao();
            this.nome = '',
            this.email = ''
          }
        });

      } catch (error) {
        tratarMensagensErro(error)
      }
    }
  },
}
</script>

<template>
  <div class="container my-5">
    <h3>Vendedores</h3>
    <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Comissão Total</th>
        <th>Vendas</th>
      </tr>
    </thead>
    <tbody>
      <tr v-if="this.$store.state.vendedores.length == 0">Sem vendedores cadastrados...</tr>
      <tr v-for="vendedor in this.$store.state.vendedores" :key="vendedor.id">
        <td>{{vendedor.nome}}</td>
        <td>{{vendedor.email}}</td>
        <td>
          <span v-if="vendedor.comissao">R$ {{vendedor.comissao}}</span>
          <span v-if="!vendedor.comissao">Sem comissão a receber</span>
        </td>
        <td>
          <span v-if="!vendedor.comissao">---</span>
          <router-link :to="'/vendas-vendedor/' + vendedor.id">
            <button class="btn btn-success" v-if="vendedor.comissao > 0">Consultar</button>
          </router-link>

        </td>
      </tr>
    </tbody>
  </table>
  </div>
</template>

<script>
import api from '../Services/Api'
import store from '../store'

export default {
  methods: {
    async buscarTodosVendedoresComComissao(){
      let vendedores = await api.get('api/vendedor')
      if (vendedores.data.length > 0) {
        store.commit('storeVendedores', vendedores.data)
      }
    }
  },
  created(){
    this.buscarTodosVendedoresComComissao()
  }
}
</script>

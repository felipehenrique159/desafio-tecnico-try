<template>
    <div class="container my-5">
        <h3>Vendedor: {{nomeVendedor}}</h3>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Comissão</th>
                    <th>Valor da Venda</th>
                    <th>Data da Venda</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="vendas in vendasVendedor" :key="vendas.id">
                    <td>R$ {{vendas.comissao}}</td>
                    <td>R$ {{vendas.valor_da_venda}}</td>
                    <td>{{vendas.data_da_venda}}</td>
                </tr>
            </tbody>
        </table>
    </div>
  </template>

  <script>
  import api from '../Services/Api'

  export default {
    data() {
        return {
            nomeVendedor: '',
            vendasVendedor: []
        };
    },
    methods: {
        async buscarVendasPorVendedor(){
        let vendas = await api.get(`api/vendas/vendedor?id=${this.idVendedor}`)
        if (vendas.data.length > 0) {
          this.vendasVendedor = vendas.data
          this.nomeVendedor = vendas.data[0].nome
        }
      }
    },
    props:{
        idVendedor: Number
    },
    created(){
        this.buscarVendasPorVendedor()
    }
  }
  </script>

  <style>

  </style>

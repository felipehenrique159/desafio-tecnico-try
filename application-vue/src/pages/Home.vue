<template>
    <div class="my-5">
      <Acoes/>
      <TabelaVendedores/>
    </div>
  </template>

  <script>
  import TabelaVendedores from '../components/TabelaVendedores.vue'
  import Acoes from '../components/Acoes.vue'

  export default {
    data() {
        return {
        };
    },
    methods: {
    },
    components:{
      TabelaVendedores,
      Acoes
    }
  }
  </script>

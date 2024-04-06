<template>
  <div class="container">
    <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalCadastroVendedor">Cadastrar Novo Vendedor</button>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalLancarNovaVenda">Lançar Nova Venda</button>

    <ModalCadastroVendedor/>
    <ModalLancarNovaVenda/>

  </div>
</template>

<script>

import ModalCadastroVendedor from './ModalCadastroVendedor.vue'
import ModalLancarNovaVenda from './ModalLancarNovaVenda.vue'

export default {
  components:{
    ModalCadastroVendedor,
    ModalLancarNovaVenda
  }
}
</script>

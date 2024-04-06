<template>
    <div>
        <TabelaVendasVendedor :idVendedor="$route.params.id"/>

        <div class="text-center">
            <router-link to="/">
                <button class="btn btn-primary">Voltar</button>
            </router-link>
        </div>
    </div>
</template>

<script>
import TabelaVendasVendedor from '../components/TabelaVendasVendedor.vue';

export default {
    components:{
        TabelaVendasVendedor
    }
}
</script>

import Home from './pages/Home.vue'
import VendasVendedor from './pages/VendasVendedor.vue'

import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/vendas-vendedor/:id',
            name: 'vendasVendedor',
            component: VendasVendedor
        },
    ],
  });

export default router

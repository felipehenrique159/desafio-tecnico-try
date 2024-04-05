<?php

namespace App\Interfaces;

use App\Models\Vendas;
use App\Models\Vendedor;

interface VendasRepositoryInterface
{
    public function salvar(int $idVendedor, float $comissao, float $valorDaVenda): Vendas;

    public function listarVendasPorVendedor(int $idVendedor);
}

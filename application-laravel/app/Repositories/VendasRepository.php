<?php

namespace App\Repositories;

use App\Interfaces\VendasRepositoryInterface;
use App\Models\Vendas;
use Carbon\Carbon;

class VendasRepository implements VendasRepositoryInterface
{
    public function salvar(int $idVendedor, float $comissao, float $valorDaVenda): Vendas
    {
        return Vendas::create([
            'id_vendedor' => $idVendedor,
            'comissao' => $comissao,
            'valor_da_venda' => $valorDaVenda,
            'data_da_venda' => Carbon::now()
        ]);
    }

    public function listarVendasPorVendedor(int $idVendedor)
    {
        return Vendas::with('vendedor')->where('id_vendedor', $idVendedor)->get();
    }
}

<?php

namespace App\Interfaces;

use App\Models\Vendas;
use Illuminate\Database\Eloquent\Collection;

interface VendasRepositoryInterface
{
    public function salvar(int $idVendedor, float $comissao, float $valorDaVenda): Vendas;

    public function listarVendasPorVendedor(int $idVendedor): Collection;

    public function buscarTotalVendasDiaAtual(): float;
}

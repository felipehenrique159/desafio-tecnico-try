<?php

namespace App\Interfaces;

use App\Models\Vendas;

interface VendasRepositoryInterface
{
    public function salvar(int $idVendedor, float $comissao, float $valorDaVenda): Vendas;

    public function listarVendasPorVendedor(int $idVendedor): array;

    public function buscarTotalVendasDiaAtual(): float;
}

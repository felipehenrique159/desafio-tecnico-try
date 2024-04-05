<?php

namespace App\Services;

use App\Enum\ComissaoEnumerador;
use App\Http\Resources\ListarVendasPorVendedorResource;
use App\Http\Resources\NovaVendaResource;
use App\Repositories\VendasRepository;

class VendasService
{
    public function __construct(
        private readonly VendasRepository $vendasRepository
    ) {}

    public function novaVenda(array $request)
    {
        $comissaoDaVenda = $this->calcularComissaoDaVenda($request['valor_da_venda']);

        $venda = $this->vendasRepository->salvar(
            $request['id_vendedor'],
            $comissaoDaVenda,
            $request['valor_da_venda']
        );

        return new NovaVendaResource($venda);
    }

    private function calcularComissaoDaVenda(float $valorDaVenda): float
    {
        $comissao = $valorDaVenda * (ComissaoEnumerador::PADRAO / 100);
        return number_format($comissao, 2);
    }

    public function listarVendasPorVendedor(int $id)
    {
        $vendas = $this->vendasRepository->listarVendasPorVendedor($id);

        return ListarVendasPorVendedorResource::collection($vendas);
    }
}

<?php

namespace App\Services;

use App\Enum\ComissaoEnumerador;
use App\Http\Resources\ListarVendasPorVendedorResource;
use App\Http\Resources\NovaVendaResource;
use App\Repositories\VendasRepository;

class VendasService
{
    public function __construct(
        private readonly VendasRepository $vendasRepository,
        private readonly ComissaoService $comissaoService
    ) {}

    public function novaVenda(array $request)
    {
        $comissaoDaVenda = $this->comissaoService->calcularComissao(
            ComissaoEnumerador::PADRAO, $request['valor_da_venda']
        );

        $venda = $this->vendasRepository->salvar(
            $request['id_vendedor'],
            $comissaoDaVenda,
            $request['valor_da_venda']
        );

        return NovaVendaResource::make($venda);
    }

    public function listarVendasPorVendedor(int $id)
    {
        $vendas = $this->vendasRepository->listarVendasPorVendedor($id);

        return ListarVendasPorVendedorResource::collection($vendas);
    }
}

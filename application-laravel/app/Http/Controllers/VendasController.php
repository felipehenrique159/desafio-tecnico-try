<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendas\CriarVendaRequest;
use App\Http\Requests\Vendas\ListarVendasPorVendedorRequest;
use App\Services\VendasService;
use Illuminate\Http\JsonResponse;

class VendasController extends Controller
{
    public function __construct(
        protected readonly VendasService $vendasService
    ) {}

    public function criarVenda(CriarVendaRequest $request): JsonResponse
    {
        $venda = $this->vendasService->novaVenda(
            $request->all()
        );

        return response()->json($venda, 201);
    }

    public function listarVendasPorVendedor(ListarVendasPorVendedorRequest $request): JsonResponse
    {
        $vendasPorVendedor = $this->vendasService->listarVendasPorVendedor(
            $request->input('id')
        );

        return response()->json($vendasPorVendedor, 200);
    }
}

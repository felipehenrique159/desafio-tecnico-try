<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendas\CriarVendaRequest;
use App\Services\VendasService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}

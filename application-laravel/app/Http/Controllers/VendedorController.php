<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendedor\CriarRequest;
use App\Services\VendedorService;
use Illuminate\Http\JsonResponse;

class VendedorController extends Controller
{
    public function __construct(
        protected readonly VendedorService $vendedorService
    ) {}

    public function criar(CriarRequest $request): JsonResponse
    {
        $vendedor = $this->vendedorService->criar(
            $request->all()
        );

        return response()->json($vendedor, 201);
    }

    public function listarTodosComComissao(): JsonResponse
    {
        $vendedores = $this->vendedorService->listarTodosComComissao();

        return response()->json($vendedores, 200);
    }
}

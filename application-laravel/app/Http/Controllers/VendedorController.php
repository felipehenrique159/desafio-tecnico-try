<?php

namespace App\Http\Controllers;

use App\Services\VendedorService;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function __construct(
        protected readonly VendedorService $vendedorService
    ) {}

    public function criar(Request $request)
    {
        $vendedor = $this->vendedorService->criar(
            $request->all()
        );

        return response()->json($vendedor, 201);
    }
}

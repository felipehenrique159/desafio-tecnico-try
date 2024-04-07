<?php

namespace App\Services;

use App\Enum\ComissaoEnumerador;
use App\Http\Resources\VendedoresResource;
use App\Repositories\VendedorRepository;

class VendedorService
{
    public function __construct(
        private readonly VendedorRepository $vendedorRepository
    ) {}

    public function criarVendedor(array $request)
    {
        return $this->vendedorRepository->salvarNovoVendedor(
            $request['nome'],
            $request['email']
        );
    }

    public function listarTodosComComissao()
    {
        $vendedores = $this->vendedorRepository->listarTodosComComissao();

        return VendedoresResource::collection($vendedores);
    }
}

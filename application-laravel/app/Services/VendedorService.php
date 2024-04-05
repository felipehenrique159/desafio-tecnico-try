<?php

namespace App\Services;

use App\Enum\ComissaoEnumerador;
use App\Repositories\VendedorRepository;

class VendedorService
{
    public function __construct(
        private readonly VendedorRepository $vendedorRepository
    ) {}

    public function criar(array $request)
    {
        return $this->vendedorRepository->criarNovo(
            $request['nome'],
            $request['email']
        );
    }
}

<?php

namespace App\Repositories;

use App\Interfaces\VendedorRepositoryInterface;
use App\Models\Vendedor;

class VendedorRepository implements VendedorRepositoryInterface
{
    public function criarNovo(string $nome, string $email): Vendedor
    {
        return Vendedor::create([
            'nome' => $nome,
            'email' => $email
        ]);
    }
}

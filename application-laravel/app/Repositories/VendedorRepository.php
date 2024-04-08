<?php

namespace App\Repositories;

use App\Interfaces\VendedorRepositoryInterface;
use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Collection;

class VendedorRepository implements VendedorRepositoryInterface
{
    public function salvarNovoVendedor(string $nome, string $email): Vendedor
    {
        return Vendedor::create([
            'nome' => $nome,
            'email' => $email
        ]);
    }

    public function listarTodosComComissao(): Collection
    {
        return Vendedor::with('comissoes')->get();
    }
}

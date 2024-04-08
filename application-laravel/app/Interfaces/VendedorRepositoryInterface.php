<?php

namespace App\Interfaces;

use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Collection;

interface VendedorRepositoryInterface
{
    public function salvarNovoVendedor(string $nome, string $email): Vendedor;

    public function listarTodosComComissao(): Collection;
}

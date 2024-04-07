<?php

namespace App\Interfaces;

use App\Models\Vendedor;

interface VendedorRepositoryInterface
{
    public function salvarNovoVendedor(string $nome, string $email): Vendedor;

    public function listarTodosComComissao(): array;
}

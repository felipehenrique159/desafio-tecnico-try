<?php

namespace App\Interfaces;

use App\Models\Vendedor;

interface VendedorRepositoryInterface
{
    public function criarNovo(string $nome, string $email): Vendedor;
}

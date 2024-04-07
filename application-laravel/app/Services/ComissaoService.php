<?php

namespace App\Services;

class ComissaoService
{
    public function calcularComissao(float $porcentagem, float $valor): float
    {
        $comissao = $valor * ($porcentagem / 100);
        return number_format($comissao, 2, '.', '');
    }
}

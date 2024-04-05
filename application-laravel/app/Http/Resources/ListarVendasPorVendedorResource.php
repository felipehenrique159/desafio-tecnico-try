<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListarVendasPorVendedorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->vendedor->id,
            'nome' => $this->vendedor->nome,
            'email' => $this->vendedor->email,
            'comissao' => $this->comissao,
            'valor_da_venda' => $this->valor_da_venda,
            'data_da_venda' => Carbon::parse($this->data_da_venda)->format('d-m-Y')
        ];
    }
}

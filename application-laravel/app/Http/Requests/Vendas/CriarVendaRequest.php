<?php

namespace App\Http\Requests\Vendas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class CriarVendaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_vendedor' => 'required|integer|exists:vendedor,id',
            'valor_da_venda' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'id_vendedor.required' => 'id_vendedor é obrigatório.',
            'id_vendedor.integer' => 'id_vendedor deve ser inteiro.',
            'id_vendedor.exists' => 'id_vendedor não existe',
            'valor_da_venda.required' => 'valor_da_venda é obrigatório.',
            'valor_da_venda.numeric' => 'valor_da_venda deve ser numerico.',
            'valor_da_venda.min' => 'valor_da_venda deve ser maior que zero'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse([
            'result' => 'Error',
            'message' => 'dados inválidos',
            'errors' => $validator->errors()
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}

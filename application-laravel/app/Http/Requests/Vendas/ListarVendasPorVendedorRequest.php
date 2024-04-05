<?php

namespace App\Http\Requests\Vendas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ListarVendasPorVendedorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'id é obrigatório.',
            'id.integer' => 'id deve ser inteiro.'
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

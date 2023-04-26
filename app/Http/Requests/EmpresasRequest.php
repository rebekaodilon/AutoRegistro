<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'complemento' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ];
    }
}

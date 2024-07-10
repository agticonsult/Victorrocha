<?php

namespace App\Http\Requests;

use App\Rules\CadastradorRule;
use Illuminate\Foundation\Http\FormRequest;

class PessoaStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:200',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'numero' => 'required',
            'reuniao' => 'required',
            'telefone' => 'required',
            'observacao' => 'max:255',
            'id_cadastrador' => ['required', new CadastradorRule],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'telefone.required' => 'Telefone obrigatório.',
            'nome.required' => 'Nome obrigatório.',
            'nome.max' => 'Descricao: Máximo 255 caracteres.',
            'observacao.max' => 'Observação: Máximo 255 caracteres.',

            'cep.required' => 'CEP obrigatório.',
            'endereco.required' => 'Endereço obrigatório.',
            'bairro.required' => 'Bairro obrigatório.',
            'numero.required' => 'Número obrigatório.',
            'reuniao.required' => 'Reunião obrigatório.',
            'id_cadastrador.required' => 'Cadastrador obrigatório.',
        ];
    }
}

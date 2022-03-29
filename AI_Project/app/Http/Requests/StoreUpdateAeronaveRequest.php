<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAeronaveRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'matricula' => 'required|max:8',
            'marca' => 'required|string|max:40',
            'modelo' => 'required|string|max:40',
            'num_lugares' => 'required|integer|min:1',
            'conta_horas' => 'required|integer|min:0',
            'preco_hora' => 'required|numeric|min:0.00',
            'tempos' => 'required|array|min:10|max:10',
            'tempos.*' => 'required|integer|min:0',
            'precos' => 'required|array|min:10|max:10',
            'precos.*' => 'required|numeric|min:0.00'
        ];

        if($this->method() == "POST"){
            $rules['matricula'] = 'required|max:8|unique:aeronaves';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'marca.regex' => 'O campo marca apenas deve conter letras e espaços.',
            'num_lugares.between' => 'O número de lugares deve estar entre 1 e 10.',
            'tempos.required' => 'É necessário preencher todos os tempos.',
            'precos.required' => 'É necessário preencher todos os preços.',
            'tempos.*.required' => 'É necessário preencher todos os tempos.',
            'tempos.*.integer' => 'Os tempos têm de ser inteiros.',
            'tempos.*.min' => 'Os tempos têm de ser maiores que 0.',
            'precos.*.required' => 'É necessário preencher todos os preços.',
            'precos.*.numeric' => 'Os preços têm de ser numéricos.',
            'precos.*.min' => 'Os preços têm de ser maiores que 0.00.',
        ];
    }
}

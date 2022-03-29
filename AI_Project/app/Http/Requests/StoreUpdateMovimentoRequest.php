<?php


namespace App\Http\Requests;

use App\Aeronave;
use App\Movimento;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMovimentoRequest extends FormRequest
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
        $rules = array();
        if(!isset($this->confirmar)){
            $rules = ['data' => 'required|date_format:"d/m/Y"|before:'.date("d/m/Y", time()),
                'hora_descolagem' => 'required|date_format:"H:i"|before:'.date("d/m/Y", time()),
                'hora_aterragem' => 'required|date_format:"H:i"|before:'.date("d/m/Y", time()),
                'aeronave' => 'required|exists:aeronaves,matricula',
                'num_diario' => 'required|integer|min:1',
                'num_servico' => 'required|integer|min:1',
                'piloto_id' => 'required|exists:users,id|integer',
                'natureza' => 'required|in:"T","I","E"',
                'aerodromo_partida' => 'required|exists:aerodromos,code',
                'aerodromo_chegada' => 'required|exists:aerodromos,code',
                'num_aterragens' => 'required|integer|min:1',
                'num_descolagens' => 'required|integer|min:1',
                'num_pessoas' => 'required|integer|min:1',
                'conta_horas_inicio' => 'required|integer|min:0',
                'conta_horas_fim' => 'required|integer|gt:conta_horas_inicio|min:0',
                'modo_pagamento' => 'required|in:"N","M","T","P"',
                'num_recibo' => 'required|digits_between:1,20',
                'observacoes' => '',
                'tempo_voo' => 'required|integer|min:0.00',
                'preco_voo' => 'required|numeric|min:0'
                ];

            if($this->natureza == "I"){
                $rules['tipo_instrucao'] = 'required|in:"D","S"';
                $rules['instrutor_id'] = 'required|exists:users,id|integer';
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'data.before_or_equal' => 'A data deverá ser antes do dia presente ou no próprio dia.',
            'hora_descolagem.date_format' => 'A data indicada para o campo hora descolagem não respeita o formato Ano-Mês-Dia Hora:Minutos:Segundos.',
            'hora_aterragem.date_format' => 'A data indicada para o campo hora descolagem não respeita o formato Ano-Mês-Dia Hora:Minutos:Segundos.'
        ];

    }

}
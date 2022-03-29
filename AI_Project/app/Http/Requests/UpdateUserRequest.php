<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class UpdateUserRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'ativo' => isset($this->ativo) ? (int)$this->ativo : 0,
            'quota_paga' => isset($this->quota_paga) ? (int)$this->quota_paga : 0,
            'direcao' => isset($this->direcao) ? (int)$this->direcao : 0,
            'instrutor' => isset($this->instrutor) ? (int)$this->instrutor : 0,
            'licenca_confirmada' => isset($this->licenca_confirmada) ? (int)$this->licenca_confirmada : 0,
            'certificado_confirmado' => isset($this->certificado_confirmado) ? (int)$this->certificado_confirmado : 0,
        ]);

        if (User::find(Auth::id())->direcao == 1) {
            $this->merge([
                'aluno' => isset($this->aluno) ? (int)$this->aluno : 0,
            ]);
        }
    }

    public function rules()
    {
        $rules_base = [
            'nome_informal' => 'required|string|max:40',
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'email' => 'required|email|max:255',
            'data_nascimento' => 'required|date_format:"d/m/Y"|before:' . date("d/m/Y", time()),
            'endereco' => '',
            'nif' => '',
            'telefone' => '',
            'classe_socio' => ''

        ];

        if (User::find(Auth::id())->direcao == 1) {
            //Caso seja da direção também tem de validar estes campos
            $rules_base['num_socio'] = 'required|integer|min:1';
            $rules_base['tipo_socio'] = 'required|in:"P","NP","A"';
            $rules_base['sexo'] = 'required|in:"M","F"';
            $rules_base['direcao'] = 'required|in:1,0';
            $rules_base['quota_paga'] = 'required|in:1,0';
            $rules_base['ativo'] = 'required|in:1,0';
            $rules_base['instrutor'] = 'required|in:1,0';
            $rules_base['aluno'] = 'required|in:1,0';
            $rules_base['licenca_confirmada'] = 'required|in:1,0';
            $rules_base['certificado_confirmado'] = 'required|in:1,0';
        }

        if (User::find(Auth::id())->tipo_socio == "P" || Auth::user()->direcao == 1) {

            $rules_base['num_licenca'] = '';
            $rules_base['tipo_licenca'] = '';
            $rules_base['validade_licenca'] = '';
            $rules_base['num_certificado'] = '';
            $rules_base['validade_certificado'] = '';
            $rules_base['classe_certificado'] = '';

            if (!empty($this->num_licenca)) {
                $rules_base['num_licenca'] = 'string|min:1|max:30';
            }

            if (!empty($this->tipo_licenca)) {
                $rules_base['tipo_licenca'] = 'string|exists:tipos_licencas,code';
            }

            if (!empty($this->validade_licenca)) {
                $rules_base['validade_licenca'] = 'date_format:"d/m/Y"';
            }

            if (!empty($this->num_certificado)) {
                $rules_base['num_certificado'] = 'string|min:1|max:30';
            }

            if (!empty($this->validade_certificado)) {
                $rules_base['validade_certificado'] = 'date_format:"d/m/Y"';
            }

            if (!empty($this->classe_certificado)) {
                $rules_base['classe_certificado'] = 'string|exists:classes_certificados,code';
            }

            if (!empty($this->file_licenca)) {
                $rules['file_licenca'] = 'mimetypes:application/pdf';
            }

            if (!empty($this->file_certificado)) {
                $rules['file_certificado'] = 'mimetypes:application/pdf';
            }
        }

        if (!empty($this->endereco)) {
            $rules_base['endereco'] = 'string';
        }

        if (!empty($this->classe_socio)) {
            $rules_base['classe_socio'] = 'required|in:"N","C","M","H"';
        }

        if (!empty($this->nif)) {
            $rules_base['nif'] = 'integer|digits:9';
        }

        if (!empty($this->telefone)) {
            $rules_base['telefone'] = 'string|min:9|max:20';
        }

        if (!empty($this->file_foto)) {
            $rules_base['file_foto'] = 'mimetypes:image/jpeg,image/png,image/jpg';
        }

        return $rules_base;
    }

    public function messages()
    {
        return [
            'nome_informal.regex' => 'O campo marca apenas deve conter letras e espaços.',
            'data_nascimento.date_format' => 'A data indicada para o campo data nascimento não respeita o formato dd/mm/yyyy.',
        ];
    }
}
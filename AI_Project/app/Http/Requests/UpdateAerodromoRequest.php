<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Aerodromo;

class UpdateAerodromoRequest extends FormRequest
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
        $rules_base = [
            'code' => 'required',
            'nome' => 'required|regex:/^[\pL\s]+$/u|max:255',
        ];
        return $rules_base;
    }

    public function messages()
    {
        return [

        ];
    }
}
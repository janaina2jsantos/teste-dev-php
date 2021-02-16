<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
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
        return [
            "id_marca"  => "required",
            "modelo"    => "required",
            "ano"       => "required"
        ];
    }

     public function messages()
    {
        return [
            'id_marca.required' => 'O campo Marca é obrigatório.',
            'modelo.required'   => 'O campo Modelo é obrigatório.',
            'ano.required'      => 'O campo Ano é obrigatório.'
        ];
    }
}

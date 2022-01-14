<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionBoletaPago extends FormRequest
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
            'trabajador_id'=>'required|integer',
            'periodo'=>'required|max:45',
            'pago_mes'=>'required',
            'descuento_mes'=>'nullable',
            'adelantos'=>'nullable',
        ];
    }
}
///////

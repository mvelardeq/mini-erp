<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpresa extends FormRequest
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
            'razon_social'=>'required|unique:empresa|max:200',
            'ruc'=>'required|unique:empresa|max:11|min:11',
            'porcentaje_detraccion'=>'required',
            'pago_hora'=>'required',
            'direccion'=>'required|max:300',
            'actividad'=>'required|max:90',
            'observacion'=>'nullable|max:400',
        ];
    }
}

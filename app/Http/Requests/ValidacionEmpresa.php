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
            'razon_social'=>'required|max:200|unique:empresa,razon_social'. $this->route('id'),
            'ruc'=>'required|max:11|min:11|unique:empresa,ruc,'. $this->route('id'),
            'porcentaje_detraccion'=>'required',
            'pago_hora'=>'required',
            'direccion'=>'required|max:300',
            'actividad'=>'required|max:90',
            'observacion'=>'nullable|max:400',
        ];
    }
}

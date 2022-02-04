<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionContrato extends FormRequest
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
            'servicio_id'=>'required',
            'equipo_id'=>'required',
            'horas'=>'required',
            'costo_sin_igv'=>'required',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'nullable',
            'observacion'=>'nullable',
            'numero_oc'=>'nullable',
            'oc'=>'nullable',
        ];
    }
}

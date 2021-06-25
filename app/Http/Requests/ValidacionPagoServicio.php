<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPagoServicio extends FormRequest
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
            'servicio_tercero_id'=>'required|integer',
            'pago'=>'required',
            'fecha_pago'=>'required',
            'proveedor'=>'required|max:200',
            'ruc_proveedor'=>'nullable|min:11|max:11',
            'observacion'=>'nullable|max:400',
        ];
    }
}

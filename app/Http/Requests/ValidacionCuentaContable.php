<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCuentaContable extends FormRequest
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
            'codigo'=>'required|unique:cuenta_contable|max:8',
            'nombre'=>'required|unique:cuenta_contable|max:240',
            'saldo'=>'required',
            'banco'=>'nullable',
            'numero_cuenta'=>'nullable',
            'responsable_id'=>'nullable',
        ];
    }
}

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
            'codigo'=>'required|max:8|unique:cuenta_contable,codigo,'. $this->route('id'),
            'nombre'=>'required|max:240|unique:cuenta_contable,nombre'. $this->route('id'),
            'saldo'=>'required',
            'banco'=>'nullable',
            'numero_cuenta'=>'nullable',
            'responsable_id'=>'nullable',
        ];
    }
}

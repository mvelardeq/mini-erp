<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCompra extends FormRequest
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
            'proveedor'=>'required|max:90',
            'fecha'=>'required',
            'total'=>'required|numeric',
            'ruc_proveedor'=>'nullable|numeric|digits:11',
            'observacion'=>'nullable|max:400'
        ];
    }
}

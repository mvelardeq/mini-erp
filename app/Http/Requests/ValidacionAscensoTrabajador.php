<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionAscensoTrabajador extends FormRequest
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
            'trabajdor_id'=>'required|integer',
            'cargo_trabajador_id'=>'required|integer',
            'sueldo'=>'required',
            'fecha'=>'required',
            'observacion'=>'nullable',
        ];
    }
}

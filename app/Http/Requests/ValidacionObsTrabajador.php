<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionObsTrabajador extends FormRequest
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
            'titulo_observacion'=>'required|max:80',
            'observacion'=>'required|max:300',
            'fecha'=>'required',
            'foto'=>'nullable',
        ];
    }
}

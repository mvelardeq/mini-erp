<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEquipo extends FormRequest
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
            'obra_id'=>'required|integer',
            'empresa_id'=>'required|integer',
            'oe'=>'required|max:12|unique:equipo,oe,'. $this->route('id'),
            'velocidad'=>'required|20',
            'paradas'=>'required|max:20',
            'carga'=>'nullable|max:20',
            'marca'=>'nullable|max:40',
            'modelo'=>'nullable|max:40',
            'accesos'=>'nullable|max:20',
            'cuarto_maquina'=>'nullable|max:20',
            'numero_equipo'=>'required|max:20',
            'plano'=>'nullable|max:30',
        ];
    }
}

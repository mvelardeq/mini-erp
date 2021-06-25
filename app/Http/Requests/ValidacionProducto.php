<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionProducto extends FormRequest
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
            'categoria_producto_id'=>'required|integer',
            'tipo_producto_id'=>'required|integer',
            'descripcion'=>'required|max:80',
            'unidades'=>'required|max:15',
            'foto'=>'nullable|max:28',
        ];
    }
}

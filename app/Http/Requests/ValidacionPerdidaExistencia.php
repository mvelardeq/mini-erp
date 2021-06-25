<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPerdidaExistencia extends FormRequest
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
            'item_compra_id'=>'required|integer',
            'fecha'=>'required',
            'motivo'=>'required|max:400',
            'cantidad'=>'required'
        ];
    }
}

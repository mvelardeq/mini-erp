<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionTrabajador extends FormRequest
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
        if ($this->route('id')) {
            return [
                'usuario' => 'required|max:50|unique:trabajador,usuario,' . $this->route('id'),
                'nombres' => 'required|max:50',
                'apllidos' => 'required|max:50',
                'dni' => 'required|max:10',
                'direccion' => 'required|max:30',
                'celular' => 'required|max:9',
                'fecha_nacimiento' => 'required|max:12',
                'foto' => 'nullable|max:20',
                'botas' => 'nullable|max:5',
                'overol' => 'nullable|max:5',
                'correo' => 'required|email|max:300|unique:trabajador,email,' . $this->route('id'),
                'password' => 'nullable|min:5',
                're_password' => 'nullable|required_with:password|min:5|same:password',
                'rol_id' => 'required|array',

            ];
        }else {
            return [
                'usuario' => 'required|max:50|unique:trabajador,usuario,' . $this->route('id'),
                'nombres' => 'required|max:50',
                'apllidos' => 'required|max:50',
                'dni' => 'required|max:10',
                'direccion' => 'required|max:30',
                'celular' => 'required|max:9',
                'fecha_nacimiento' => 'required|max:12',
                'foto' => 'nullable|max:20',
                'botas' => 'nullable|max:5',
                'overol' => 'nullable|max:5',
                'correo' => 'required|email|max:100|unique:trabajador,email,' . $this->route('id'),
                'password' => 'required|min:5',
                're_password' => 'required|min:5|same:password',
                'rol_id' => 'required|array'
            ];
        }
    }
}

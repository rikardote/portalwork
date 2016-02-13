<?php

namespace App\Modules\Citas\Http\Requests;

use App\Http\Requests\Request;

class CitasRequest extends Request
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
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'fecha' => 'required',
            'horario' => 'required',

        ];
    }
}

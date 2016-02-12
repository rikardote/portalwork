<?php

namespace App\Modules\inventario\Http\Requests;


use App\Http\Requests\Request;

class IpRequest extends Request
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
            'ip' => 'required',
            'name' => 'required',
            'machine_name' => 'required',
            'ubicacion_id' => 'required',

        ];
    }
}

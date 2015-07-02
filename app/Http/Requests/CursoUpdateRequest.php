<?php

namespace CrudLaravel\Http\Requests;

use CrudLaravel\Http\Requests\Request;

class CursoUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//false para no autorizarlo
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'id_profesor' => 'required',
            'descripcion' => 'required',
            'periodo' => 'required',
            'anio' => 'required',
            'fecha_inicio' => 'required',
        ];
    }
}

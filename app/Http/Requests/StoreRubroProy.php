<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRubroProy extends FormRequest
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
            'state_id' => 'required',
            'rubro_id' => 'required',
            'unidad_id' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            
            //'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'state_id.required' => 'El campo Categoria es Requerido',
            'rubro_id.required' => 'El campo Rubro es Requerido',
            'unidad_id.required' => 'El campo Unidad de Medida es Requerido',
            'quantity.required'  => 'El campo Cantidad es Requerido',
            'objectives.required' => 'El campo Resultados es Requerido',
            'unit_price.required'  => 'El campo Precio Unitario es Requerido',
        ];
    }
}

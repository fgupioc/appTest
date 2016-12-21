<?php

namespace appTest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
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
            'proveedor_id'=>'required',
            'serie_doc'=>'required',
            'num_doc'=>'required',
            'impuesto'=>'required',
            'cantidad'=>'required|numeric',
            'precio_comp'=>'required',
            'precio_vent'=>'required',
        ];
    }
}

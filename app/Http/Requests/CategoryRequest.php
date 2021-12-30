<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
   
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
            'slug' => 'required',
            'name' => 'required',
            'language' => 'required',
        ];
    }

    public function messages()
    {        
        return [
            'slug.required' => 'El slug es obligatorio',
            'name.required' => 'El nombre es obligatorio',
            'language.required' => 'El lenguage es obligatorio',
        ];
    }
}

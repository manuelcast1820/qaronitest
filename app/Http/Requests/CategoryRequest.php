<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
            'json_description' => function($attribute, $value, $fail) {
                $fieldstep = json_decode($value);
                if (count($fieldstep) == 0) {
                    return true;
                }
                $this->validateDescription($fieldstep, $fail);
            }
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

    private function validateDescription($fieldstep, $fail){
        foreach ($fieldstep as $key => $detail) {
                    
            $fieldDetailValidator = Validator::make((array)$detail, [
                'name' => 'required',
                'language' => 'required',
            ],
            [
                'name.required' => 'El nombre de la categoria es obligatoria',
                'language.required' => 'El lenguage es obligatorio',
            ]
            )->validate();

       }
    }
}

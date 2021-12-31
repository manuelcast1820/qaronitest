<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class EventRequest extends FormRequest
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
        $now = Carbon::now();
        return [
            'slug' => 'required',
            'categoryId' => 'required',
            'date' => 'required|date|after:'.$now,
            'capacity' => 'required|numeric|min:1',
            'json_description' => function($attribute, $value, $fail) {
                if($value == null){
                    return true;
                }
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
            'categoryId.required' => 'La categoria es obligatoria',
            'date.required' => 'La fecha es obligatoria',
            'capacity.required' => 'La capacidad es obligatoria',
            'capacity.min' => 'La capacidad minima es 1',
            'date.after' => 'La fecha debe ser mayor a la actual',
        ];
    }

    private function validateDescription($fieldstep, $fail){
        foreach ($fieldstep as $key => $detail) {
                    
            $fieldDetailValidator = Validator::make((array)$detail, [
                'name' => 'required',
                'language' => 'required',
            ],
            [
                'name.required' => 'El nombre del evento es obligatorio',
                'language.required' => 'El lenguage es obligatorio',
            ]
            )->validate();

       }
    }
}

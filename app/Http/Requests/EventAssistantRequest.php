<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Models\EventAssistant;
use Illuminate\Foundation\Http\FormRequest;

class EventAssistantRequest extends FormRequest
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
        $event = Event::find($this->eventID);
        $reserved = EventAssistant::where('eventId',$this->eventID)->sum('quantity');
        $available = $event->capacity-$reserved;
        return [
            'email' => 'required|email',
            'quantity' => 'required|numeric|max:'.$available,
            'eventID' => 'required',
        ];
    }

    public function messages()
    {        
        return [
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo no tiene el formato correcto',
            'quantity.required' => 'La cantidad es obligatoria',
            'eventID.required' => 'El evento es obligatorio',
            'quantity.max' => 'El numero maximo de entradas que puede comprar es :max',
        ];
    }
}

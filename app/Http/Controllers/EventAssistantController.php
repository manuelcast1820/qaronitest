<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventAssistantRequest;
use App\Models\EventAssistant;
use Illuminate\Http\Request;

class EventAssistantController extends Controller
{
    public function saveAssistant(EventAssistantRequest $request){
        $assistant = new EventAssistant();
        $assistant->eventId = $request->eventID;
        $assistant->quantity = $request->quantity;
        $assistant->email = $request->email;
        $assistant->save();

        return response()->json([
            'success' => true,
            'message' =>'Muchas gracias, Reservaste exitosamente'
        ]);
    }
}


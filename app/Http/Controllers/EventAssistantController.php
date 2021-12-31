<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventAssistantRequest;
use App\Jobs\EmailAssistantJob;
use App\Mail\EmailAssistant;
use App\Models\Event;
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

        $event = Event::find($request->eventID);
        dispatch(new EmailAssistantJob($event,$assistant->email,$assistant->quantity));

        return response()->json([
            'success' => true,
            'message' =>'Muchas gracias, Reservaste exitosamente'
        ]);
    }
}


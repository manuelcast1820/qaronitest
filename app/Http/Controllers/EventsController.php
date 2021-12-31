<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\CategoryDescription;
use App\Models\Event;
use App\Models\EventDescription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = EventDescription::where('language',$request->language)->get();;
        return view('front.welcome',compact('events'));
    }

    public function create(Request $request)
    {
        $event = new EventDescription();
        $language = $request->language;
        return view('front.events.create',compact('event','language'));
    }

    public function store(EventRequest $request)
    {
        $event = new Event();
        $data = $request->except('description');
        $datadescription = $request->only('description');
        $date = new Carbon($data['date']);
        $data['date'] = $date;
        $event->fill($data);
        $event->save();

        $datadescription = $request->only('json_description');
        if(count(json_decode($datadescription['json_description'])) > 0){
            foreach(json_decode($datadescription['json_description']) as $item){
                $description = new EventDescription();
                $description->eventId = $event->id;
                $description->language = $item->language;
                $description->name = $item->name;
                $description->save();
            }
        }
        return redirect('/events?language='.session('lang'));
    }

    public function edit($id,Request $request)
    {
        $language = $request->language;
        $event = Event::find($id);
        return view('front.events.edit',compact('event','language'));
    }

    public function show($id)
    {
        $event = Event::find($id);
        return response()->json([ 'event' => $event ]);
    }

    public function update($id,EventRequest $request)
    {
        $datadescription = $request->only('json_description');
        $date = new Carbon($request->date);
        $data['date'] = $date;
        $event = Event::find($id);
        $event->slug = $request->slug;  
        $event->categoryId = $request->categoryId;
        $event->date = $date;
        $event->capacity = $request->capacity;
        $event->save();
        if(count(json_decode($datadescription['json_description'])) > 0){
            foreach(json_decode($datadescription['json_description']) as $item){
                $description = new EventDescription();
                $description->eventId = $event->id;
                $description->language = $item->language;
                $description->name = $item->name;
                $description->save();
            }
        }
        return redirect('/events?language='.session('lang'));
    }



}

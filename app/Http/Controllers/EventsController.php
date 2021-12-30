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
    public function index()
    {
        $events = Event::all();
        return view('front.welcome',compact('events'));
    }

    public function create()
    {
        $event = new EventDescription();
        return view('front.events.create',compact('event'));
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
        $event->description()->create($datadescription["description"]);

        // $result = $event->isValid();

        // $events = $request->
        // $category->slug = $request->slug;   
        // $category->save();
        // $description = new CategoryDescription();
        // $description->name = $request->description['name'];
        // $description->language = $request->description['language'];
        // $description->categoryId = $category->id;
        // $description->save();
        return redirect('/categories');

    }


}

<?php

namespace App\Observers;

use App\Models\EventDescription;

class EventDescriptionObserver
{
    /**
     * Handle the EventDescription "created" event.
     *
     * @param  \App\Models\EventDescription  $eventDescription
     * @return void
     */
    public function created(EventDescription $eventDescription)
    {
        //
    }

    public function creating(EventDescription $event)
    {
        
        dd($event);
    }

    /**
     * Handle the EventDescription "updated" event.
     *
     * @param  \App\Models\EventDescription  $eventDescription
     * @return void
     */
    public function updated(EventDescription $eventDescription)
    {
        //
    }

    /**
     * Handle the EventDescription "deleted" event.
     *
     * @param  \App\Models\EventDescription  $eventDescription
     * @return void
     */
    public function deleted(EventDescription $eventDescription)
    {
        //
    }

    /**
     * Handle the EventDescription "restored" event.
     *
     * @param  \App\Models\EventDescription  $eventDescription
     * @return void
     */
    public function restored(EventDescription $eventDescription)
    {
        //
    }

    /**
     * Handle the EventDescription "force deleted" event.
     *
     * @param  \App\Models\EventDescription  $eventDescription
     * @return void
     */
    public function forceDeleted(EventDescription $eventDescription)
    {
        //
    }
}

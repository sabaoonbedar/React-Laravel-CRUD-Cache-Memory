<?php

namespace App\Listeners;
use App\EmployeeDetails;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use cache;

class EmployeeCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        cache()->forget('employee:all'); //forget all the cache data initially

        $data = EmployeeDetails::all(); //fetch all data

        cache()->forever('employee:all', $data); // and put them into cache forever
    }
}

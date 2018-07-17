<?php

namespace Iamjaime\Credits\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Iamjaime\Credits\Models\TeamCredit as Credit;

class TeamCreated
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
        $team = $event->team;

        //now lets make the new credits record....
        $credits = new Credit();
        $credits->team_id = $team->id;
        $credits->save();

    }
}

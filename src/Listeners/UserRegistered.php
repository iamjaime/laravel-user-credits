<?php

namespace Iamjaime\Credits\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Iamjaime\Credits\Models\UserCredit as Credit;

class UserRegistered
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
        $user = $event->user;

        //now lets make the new credits record....
        $credits = new Credit();
        $credits->user_id = $user->id;
        $credits->save();

    }
}

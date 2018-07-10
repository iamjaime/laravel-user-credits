<?php

namespace Iamjaime\Credits\Listeners;

use Laravel\Spark\Events\Subscription\SubscriptionCancelled;
use Laravel\Spark\Subscription;

class UserSubscribed
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        $currentPlan = $event instanceof SubscriptionCancelled
            ? null : $event->user->subscription()->provider_plan;

        $subscription = Subscription::where('stripe_plan', '=', $currentPlan)->first();
        $credits = $subscription->credits;

        //lets add the credits for this user....
        $event->user->addCredits($credits);
    }
}
<?php
namespace Iamjaime\Credits\Traits;

use Iamjaime\Credits\Models\UserCredit as Credit;

trait UsesCredits
{

    /**
     * Get the credit amount for specified user
     * @return mixed
     */
    public function credit()
    {
        return $this->hasOne('Iamjaime\Credits\Models\UserCredit', 'user_id');
    }


    /**
     * Handles updating the user's credits
     *
     * @param $amount
     * @return mixed
     */
    public function updateCredits($amount)
    {
        $credits = Credit::where('user_id', '=', $this->id)->first();
        $credits->amount = $amount;
        $credits->save();

        return $credits;
    }

    /**
     * Handles adding more credits to the user's existing
     * amount of credits.
     *
     * @param $amount
     * @return mixed
     */
    public function addCredits($amount)
    {
        $credits = Credit::where('user_id', '=', $this->id)->first();
        $credits->amount = $credits->amount + $amount;
        $credits->save();

        return $credits;
    }


    /**
     * Handles deducting credits from the user's existing
     * amount of credits
     *
     * @param $amount
     * @return mixed
     */
    public function deductCredits($amount)
    {
        $credits = Credit::where('user_id', '=', $this->id)->first();
        $credits->amount = $credits->amount - $amount;
        $credits->save();

        return $credits;
    }



    /**
     * Handles extending the create method in order to create a User Credits record
     *
     * @param array $attributes
     * @return mixed
     */
    public static function create(array $attributes = [])
    {
        $user = static::query()->create($attributes);

        //now lets make the new credits record....
        $credits = new Credit();
        $credits->user_id = $user->id;
        $credits->save();

        return $user;
    }

}
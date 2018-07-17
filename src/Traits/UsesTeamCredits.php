<?php
namespace Iamjaime\Credits\Traits;

use Iamjaime\Credits\Models\TeamCredit as Credit;

trait UsesTeamCredits
{

    /**
     * Get the credit amount for specified team
     * @return mixed
     */
    public function credit()
    {
        return $this->hasOne('Iamjaime\Credits\Models\TeamCredit', 'team_id');
    }


    /**
     * Handles updating the team's credits
     *
     * @param $amount
     * @return mixed
     */
    public function updateCredits($amount)
    {
        $credits = Credit::where('team_id', '=', $this->id)->first();
        $credits->amount = $amount;
        $credits->save();

        return $credits;
    }

    /**
     * Handles adding more credits to the team's existing
     * amount of credits.
     *
     * @param $amount
     * @return mixed
     */
    public function addCredits($amount)
    {
        $credits = Credit::where('team_id', '=', $this->id)->first();
        $credits->amount = $credits->amount + $amount;
        $credits->save();

        return $credits;
    }


    /**
     * Handles deducting credits from the team's existing
     * amount of credits
     *
     * @param $amount
     * @return mixed
     */
    public function deductCredits($amount)
    {
        $credits = Credit::where('team_id', '=', $this->id)->first();
        $credits->amount = $credits->amount - $amount;
        $credits->save();

        return $credits;
    }

}
<?php

namespace Iamjaime\Credits\Models;

use Illuminate\Database\Eloquent\Model;

class TeamCredit extends Model
{

    public $fillable = [
        'amount'
    ];

    public $timestamps = false;

    public $hidden = [
        'id',
        'team_id'
    ];
}

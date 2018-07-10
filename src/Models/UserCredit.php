<?php

namespace Iamjaime\Credits\Models;

use Illuminate\Database\Eloquent\Model;

class UserCredit extends Model
{

    public $fillable = [
      'amount'
    ];

    public $timestamps = false;

    public $hidden = [
      'id',
      'user_id'
    ];
}

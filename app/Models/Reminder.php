<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    //
    protected $fillable = ['user_id', 'time', 'day_of_week', 'category'];
}

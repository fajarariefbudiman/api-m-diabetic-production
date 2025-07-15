<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReminderLog extends Model
{
    //
    protected $fillable = ['user_id', 'date', 'is_taken', 'category'];
}

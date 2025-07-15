<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WoundLog extends Model
{
    //
    protected $fillable = [
        'user_id',
        'log_date',
        'description',
        'image_url'
    ];
}

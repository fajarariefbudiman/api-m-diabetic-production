<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTracking extends Model
{
    /** @use HasFactory<\Database\Factories\DailyTrackingFactory> */
    use HasFactory;
    protected $table = 'daily_tracking';

    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'glucose_level',
        'water_intake',
        'sleep_hours',
        'calories_total',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\MealScheduleFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'meal_time',
        'meal_type',
        'calories_target'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

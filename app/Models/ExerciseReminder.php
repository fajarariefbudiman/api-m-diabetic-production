<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_type',
        'scheduled_time',
        'duration_minutes',
        'video_url',
        'notes'
    ];
}


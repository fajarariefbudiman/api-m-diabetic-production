<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealInput extends Model
{
    /** @use HasFactory<\Database\Factories\MealInputFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'meal_type',
        'food_id',
        'manual_name',
        'carbs',
        'sugar',
        'calories',
        'time'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

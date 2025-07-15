<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'password',
        'age',
        'birth_date',
        'role',
        'gender',
        'family_history',
        'height',
        'weight',
        'bmi',
        'diabetes_type',
        'glucose_level'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'email_verified_at' => 'datetime',
        'height' => 'float',
        'weight' => 'float',
        'bmi' => 'float',
        'glucose_level' => 'float',
    ];
}

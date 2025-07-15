<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationReminder extends Model
{
    /** @use HasFactory<\Database\Factories\MedicationReminderFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'medication_name',
        'dosage',
        'time',
        'type',
        'notes'
    ];
}

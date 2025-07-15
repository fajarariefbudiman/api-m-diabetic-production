<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScreeningAnswer extends Model
{
    //
    protected $fillable = ['session_id', 'question_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(ScreeningQuestion::class);
    }
}

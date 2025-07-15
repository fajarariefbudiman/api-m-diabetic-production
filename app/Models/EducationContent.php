<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationContent extends Model
{
    /** @use HasFactory<\Database\Factories\EducationContentFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'content',
        'file_url',
        'category'
    ];
}

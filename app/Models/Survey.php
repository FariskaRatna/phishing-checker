<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age_range',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'feedback',
    ];
}

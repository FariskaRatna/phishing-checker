<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phishing extends Model
{
    protected $fillable = [
        'url', 'prediction', 'confidence', 'phishing_probability', 'nameservers', 'features',
        'extracted_content'
    ];

    protected $casts = [
        'nameservers' => 'array',
        'features' => 'array',
        'extracted_content' => 'array',
    ];
}

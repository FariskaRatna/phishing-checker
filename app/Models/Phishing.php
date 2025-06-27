<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phishing extends Model
{
    protected $fillable = [
        'url', 'prediction', 'confidence', 'phishing_probability', 'nameservers', 'features',
        'extracted_content', 'llm_analysis'
    ];

    protected $casts = [
        'nameservers' => 'array',
        'features' => 'array',
        'extracted_content' => 'array',
    ];
}

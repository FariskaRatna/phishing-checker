<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phishing extends Model
{
    protected $fillable = [
        'url',
        'prediction',
        'confidence',
        'domain',
        'phishing_probability',
        'nameservers',
        'features',
        'extracted_content',
        'adjusted_confidence',
        'final_prediction',
        'final_confidence',
        'trusted_domain',
        'llm_analysis',
        'ip',
        'id_user'
    ];

    protected $casts = [
        'nameservers' => 'array',
        'features' => 'array',
        'extracted_content' => 'array',
    ];
}

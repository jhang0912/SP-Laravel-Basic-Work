<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogError extends Model
{
    use HasFactory;

    /* attributes */
    protected $guarded = [];

    protected $casts = [
        'header' => 'array',
        'trace' => 'array',
        'params' => 'array'
    ];

    /* Relationships */
}

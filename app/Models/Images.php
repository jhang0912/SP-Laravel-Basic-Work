<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    /* attributes */
    protected $fillable = [
        'source_type',
        'source_id',
        'path',
        'file_name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /* functions */
    public function source()
    {
        return $this->morphTo();
    }
}

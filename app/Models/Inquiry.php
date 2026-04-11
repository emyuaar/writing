<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'source_url',
        'service_reference',
        'status',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];
}

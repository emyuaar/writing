<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'service_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'order_details',
        'status',
        'payment_status',
        'amount',
        'internal_notes',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

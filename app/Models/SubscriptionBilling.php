<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionBilling extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subscription_id',
        'amount',
        'billing_date',
        'status',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

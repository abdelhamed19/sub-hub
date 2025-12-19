<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'plan_id',
        'client_id',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function billings()
    {
        return $this->hasMany(SubscriptionBilling::class);
    }
}

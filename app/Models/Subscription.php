<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends BaseModel
{
    use HasFactory, SoftDeletes;
    public static $cacheTag = 'subscriptions';
    protected $fillable = [
        'plan_id',
        'client_id',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function scopeSearch($query, $term, $fields = [])
    {
        if (!$term) {
            return $query;
        }

        $term = "%{$term}%";

        return $query->where(function ($q) use ($term) {
            $q->where('is_active', 'like', $term);
            $q->orWhere('start_date', 'like', $term);
            $q->orWhere('end_date', 'like', $term);
            $q->whereHas('plan', function ($plan) use ($term) {
                $plan->where('name', 'like', $term);
            })->orWhereHas('client', function ($client) use ($term) {
                $client->where('name', 'like', $term)
                    ->orWhere('email', 'like', $term);
            });
        });
    }

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

    protected static function booted()
    {
        static::saving(function ($subscription) {
            Cache::tags($subscription::$cacheTag)->flush();
        });

        static::deleted(function ($subscription) {
            Cache::tags([$subscription::$cacheTag])->flush();
        });
    }
}

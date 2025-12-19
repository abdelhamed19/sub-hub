<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'price',
        'compare_price',
        'duration_days',
        'is_active',
        'features',
        'type',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getFeaturesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = $value ? json_encode($value) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('description', 'like', $term);
        });
    }

    protected static function booted()
    {
        static::saving(function ($plan) {
            Cache::forget('plans');
        });

        static::deleted(function ($plan) {
            Cache::forget('plans');
        });
    }
}

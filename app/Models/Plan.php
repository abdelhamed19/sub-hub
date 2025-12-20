<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends BaseModel
{
    use HasFactory, SoftDeletes;
    public static $cacheTag = 'plans';
    public static $searchableFields = ['name', 'description'];
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

}

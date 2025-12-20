<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends BaseModel
{
    use HasFactory, SoftDeletes, UploadTrait;
    const LOGO_DIR = 'clients/logos';
    public static $cacheTag = 'clients';
    public static $searchableFields = ['name', 'legal_name', 'email'];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
        'website',
        'is_active',
        'legal_name',
        'alternative_phone',
        'city',
        'country',
        'postal_code',
        'business_type',
        'industry',
        'tax_id',
        'commercial_registration',
        'employees_count',
        'notes',
    ];

    public function clientAssistants()
    {
        return $this->hasMany(ClientAssistant::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function plan()
    {
        return $this->hasOneThrough(Plan::class, Subscription::class, 'client_id', 'id', 'id', 'plan_id');
    }

    public function subscriptionBillings()
    {
        return $this->hasManyThrough(SubscriptionBilling::class, Subscription::class, 'client_id', 'subscription_id', 'id', 'id');
    }

    protected static function booted()
    {
        static::deleted(function ($client) {
            $client->deleteImage($client->logo);
            Cache::tags($client::$cacheTag)->flush();
        });

        static::saving(function ($client) {
            Cache::tags($client::$cacheTag)->flush();
        });
    }

    public function getLogoAttribute($value)
    {
        return $this->getImageUrl($value);
    }
}

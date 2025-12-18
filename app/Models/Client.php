<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes, UploadTrait;
    const LOGO_DIR = 'clients/logos';
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('legal_name', 'like', $term)
                ->orWhere('email', 'like', $term);
        });
    }

    protected static function booted()
    {
        static::deleted(function ($client) {
            $client->deleteImage($client->logo);
        });
    }
}

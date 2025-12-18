<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ClientAssistant extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UploadTrait;
    const IMAGE_DIR = 'clients/assistants';
    protected $fillable = [
        'client_id',
        'name',
        'email',
        'password',
        'phone',
        'is_active',
        'last_login_at',
        'role',
        'image',
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('email', 'like', $term);
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected static function booted()
    {
        static::deleted(function ($clientAssistant) {
            $clientAssistant->deleteImage($clientAssistant->image);
        });
    }
}

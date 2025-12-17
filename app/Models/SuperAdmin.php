<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, UploadTrait;
    const IMAGE_DIRECTORY = 'super_admin_images';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'last_login_at',
        'is_active',
        'image',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('email', 'like', $term);
        });
    }

    protected static function booted()
    {
        static::deleted(function ($superAdmin) {
            $superAdmin->deleteImage($superAdmin->image);
        });
    }
}

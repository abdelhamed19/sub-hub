<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientAssistant extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'client_id',
        'name',
        'email',
        'password',
        'phone',
        'is_active',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

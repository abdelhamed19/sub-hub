<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientAssistant extends Model
{
    use HasFactory;
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
}

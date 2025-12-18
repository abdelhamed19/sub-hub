<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'flag'];

    public function getNameAttribute($value)
    {
        $lang = app()->getLocale();
        $names = json_decode($value, true);
        return $names[$lang] ?? $names['en'] ?? null;
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = json_encode($value);
    }
}

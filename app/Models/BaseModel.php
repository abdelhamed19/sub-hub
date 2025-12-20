<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function getCacheKeyForList($cacheTag, ...$params)
    {
        if (!empty($params)) {
            $cacheTag .= ':' . implode(':', $params);
        }
        return $cacheTag;
    }

    public function scopeSearch($query, $term, $fields = [])
    {
        if (!$term) {
            return $query;
        }

        $term = "%$term%";
        $query->where(function ($query) use ($term, $fields) {
            $operation = 'like';
            foreach ($fields as $field) {
                if ($field === 'is_active') {
                    $operation = '=';
                }
                $query->orWhere($field, $operation, $term);
            }
        });
    }

    public static function deleteByIds($ids)
    {
        return static::whereIn('id', $ids)->delete();
    }

    public function getCountryNameAttribute()
    {
        $code = $this->attributes['country'] ?? null;
        if (!$code) {
            return null;
        }
        return Country::where('code', $code)->first()->name ?? $code;
    }
}

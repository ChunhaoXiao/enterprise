<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCache;
class Link extends Model
{
    use ClearCache;
    protected $fillable = [
    	'name', 'url', 'order', 'is_show',
    ];

    public function scopeEnabled($query)
    {
        return $query->where('is_show', 1)->orderBy('order');
    }

    public function setUrlAttribute($value)
    {
    	$this->attributes['url'] = ltrim($value, 'http://');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCache;

class Property extends Model
{
    use ClearCache;

    protected $fillable = [
    	'name', 'order'
    ];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function setOrderAttribute($value)
    {
    	$this->attributes['order'] = intval($value)?? 0;
    }

   
}

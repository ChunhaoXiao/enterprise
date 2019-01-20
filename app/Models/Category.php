<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Cache;
use App\Traits\ClearCache;
class Category extends Model
{
	use ClearCache;
	
    protected $fillable = [
    	'name',
    ];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    // public static function boot()
    // {
    // 	parent::boot();
    // 	static::created(function($category) {
    // 		Cache::forget('all_categories');
    // 	});
    // }
}

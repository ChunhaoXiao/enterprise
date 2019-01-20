<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Download extends Model
{
    protected $fillable = [
    	'title', 'path', 'type', 'size', 'times'
    ];

    public static function boot()
    {
    	parent::boot();
    	static::deleted(function($model){
    		if(Storage::exists($model->path))
    		{
    			Storage::delete($model->path);
    		}
    	});
    }

    // public function setPathAttribute($value)
    // {
        
    // }

    public function scopeSearch($query, $title)
    {
    	if(!empty($title))
    	{
    		$query->where('title', 'like', $title.'%');
    	}
    	return $query;
    }
}

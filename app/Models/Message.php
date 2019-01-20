<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'name', 
    	'mobile', 
    	'email', 
    	'message', 
    	'ip', 
    	'is_read',
    ];

    public function scopeSearch($query, $where)
    {
    	if(is_array($where) && !empty($where))
    	{
    		foreach($where as $field => $value)
    		{
    			if(in_array($field, ['mobile', 'name', 'email']))
    			{
    				$query->where($field, $value);
    			}
    		}
    	}
    	return $query;
    }
}

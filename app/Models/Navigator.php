<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCache;
class Navigator extends Model
{
	use ClearCache;
	
    protected $fillable = [
    	'name', 'link', 'order_num', 'enabled'
    ];
}

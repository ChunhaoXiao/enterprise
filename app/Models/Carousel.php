<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCache;

class Carousel extends Model
{
	use ClearCache;
    protected $fillable = [
    	'path',
    	'order',
    	'enabled',
    	'link',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
    	'path',
    	'product_id',
    	'is_cover',
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}

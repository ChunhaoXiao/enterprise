<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCache;
class Cases extends Model
{
    use ClearCache;
	protected $table = 'cases';
	protected $casts = [
		'pictures' => 'array',
	];
	
    protected $fillable = [
    	'title', 'content', 'pictures',
    ];

    public function getOne($id)
    {
    	return $this->findOrFail($id);
    }
}

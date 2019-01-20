<?php 
namespace App\Traits;
use Cache;
trait ClearCache
{
	//增、删、改后自动更新缓存
	public static function boot()
	{
		parent::boot();

		foreach(['created', 'updated', 'deleted'] as $event)
        {
            static::$event(function($model) use($event){
              $model->clearCache($event);
            });
        }
	}

	protected function clearCache($event)
	{
		$table = $this->getTable();
		//\Log::info($table);
		if($table == 'products')
		{
			Cache::forget('products');
			Cache::forget('categories');
		}
		else
		{
			Cache::forget($table);
		}	
		if($table == 'properties' && $event == 'deleted')
		{
			$this->products()->detach();
		}	
	}
}
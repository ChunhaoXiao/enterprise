<?php 
namespace App\Services;
use App\Models\About;
use App\Services\UploadService;
class AboutService
{
	public function save($attributes, $id = null)
	{
		if($attributes['category'] == 'contact')
		{
			foreach ($attributes as $key => $value) {
				if(in_array($key, array_keys(config('menu.contacts'))))
				{
					if(is_a($value, \Illuminate\Http\UploadedFile::class))
					{
						$contacts[$key] = UploadService::upload($value, 'contacts');
					}
					else
					{
						$contacts[$key] = $value;
					}
				}
			}
			$contents = serialize($contacts);
		}
		else
		{
			$contents = $attributes['content'];
		}

		if($id)
		{
			$row = About::findOrFail($id);
			$row->update(['content' => $contents]);
			return $row;
		}
		return About::updateOrCreate(['category' => $attributes['category']], ['content' => $contents]);
	}
}

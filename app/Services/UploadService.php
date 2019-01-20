<?php
namespace App\Services;
use Storage;
use Illuminate\Http\UploadedFile;

class UploadService
{
	public static  function upload($file, $dir = '/')
	{
		if(is_a($file, UploadedFile::class))
		{
			return $file->store($dir);
		}
	}

	public static  function uploadAll(array $files, $path = '/')
	{
		$paths = [];
		if(count($files))
		{
			foreach($files as $file)
			{
				$paths[] = self::upload($file, $path);
			}
		}
		return $paths;
	} 
}
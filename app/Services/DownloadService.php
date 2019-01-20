<?php 
namespace App\Services;
use App\Models\Download;
use Storage;
class DownloadService
{
	private $download ;

	public function __construct(Download $download)
	{
		$this->download = $download;
	}

	/**
	 * 添加或更新 download 内容
	 * @ array $data
	 * @return model 
	 */
	public function save($data, $id = null)
	{
		$fileinfo = $this->uploadFile($data['file']);
		$data = array_merge($fileinfo, $data);
		if($id)
		{
			$download = $this->download->findOrFail($id);
			$download->update($data);
			return $download;
		}
		return $this->download->create($data);
	}

	protected function uploadFile($file)
	{
		$data = [];
		if(!empty($file))
		{
			$uploadedfile = Storage::putFile('document', $file);
		    $data['path'] = $uploadedfile;
		    $data['type'] = \File::extension($uploadedfile);
		    $data['size'] = Storage::size($uploadedfile);
		}
		return $data;
	}
}
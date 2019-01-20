<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;
use Storage;
use App\Events\FileDownloaded;

class DownloadController extends Controller
{
	private $download;

	public function __construct(Download $download)
	{
		$this->download = $download;
	}

    public function index(Request $request)
    {
    	$datas = $this->download->search($request->title)->latest()->paginate(25);
    	return view('home.download.index', ['datas' => $datas]);
    }

    public function show($id, $action)
    {
    	$download = $this->download->findOrFail($id);
        event(new FileDownloaded($download));
        if($action == 'open')
        {
            return response()->file('storage/'.$download->path);
        }
        return response()->download('storage/'.$download->path);
    }
}

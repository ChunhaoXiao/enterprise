<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Models\Download;
use App\Services\DownloadService;

class DownloadController extends Controller
{
    private $downloadService;

    public function __construct(DownloadService $downloadService)
    {
        $this->downloadService = $downloadService;
    }

    public function index()
    {
        $datas = Download::latest()->paginate(25);
    	return view('admin.download.index', ['datas' => $datas]);
    }

    public function create()
    {
    	return view('admin.download.create');
    }

    public function store(Request $request, DownloadService $downloadService)
    {
        $data = $request->validate([
            'title' => 'required',
            'file' => 'required|file', 
        ]);
        $downloadService->save($data);
        return redirect()->route('downloads.index');
    }

    public function edit(Download $download)
    {
        return view('admin.download.create', ['data' => $download]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'file' => 'required|file', 
        ]);
        $this->downloadService->save($request->all(), $id);
        return redirect()->route('downloads.index');
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return response()->json('success', 200);
    }

    public function show($id)
    {
        $data = Download::findOrFail($id);
        if(!Storage::exists($data->path))
        {
            abort(404);
        }
        return Storage::download($data->path);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Validator;
use Auth;
use App\Http\Requests\AboutRequest;
use App\Services\AboutService;

class AboutController extends Controller
{
    private $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }

	public function index()
	{
		$datas = $this->about->get();
		return view('admin.about.index')->with('datas', $datas);
	}

    public function create()
    {
    	return view('admin.about.create');
    }

    public function edit($id)
    {
        $about = $this->about->find($id);
    	return view('admin.about.edit', ['about' => $about]);
    }

    public function store(AboutRequest $request, AboutService $aboutService)
    {   
        $aboutService->save($request->all());
    	return redirect()->route('abouts.index');
    }

    public function update(Request $request, AboutService $aboutService, $id)
    {
        $aboutService->save($request->all(), $id);
        return redirect()->route('abouts.index');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return response()->json('success', 201);
    }

    public function ajaxUpload(Request $request)
    {
    	$request->validate([
    		'image' => 'image',
    	]);
    	$path = $request->image->store('abouts');
    	$path = ltrim($path, 'public');
    	return asset('storage/'.$path);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Carbon\Carbon;
use App\Services\UploadService;

class CarouselsController extends Controller
{
    private $carousel;

    public function __construct(Carousel $carousel)
    {
        $this->carousel = $carousel;
    }

	public function index()
	{
		$pictures = Carousel::all();
		return view('admin.carousel.index', ['pictures' => $pictures]);
	}

    public function create()
    {
    	return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'picture' => 'required|image',
    	]);
        $path = UploadService::upload($request->picture);
        $data = $request->all();
        $data['path'] = $path;
    	$this->carousel->create($data);
        return redirect()->route('carousels.index');
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.create', ['carousel' => $carousel]);
    }

    public function update(Request $request, Carousel $carousel)
    {
        $data = $request->all();
        if($request->picture)
        {
            $path = UploadService::upload($request->picture, 'carousel');
            $data['path'] = $path;
        }

        $carousel->update($data);
        return redirect()->route('carousels.index');
    }

    public function destroy(Carousel $carousel)
    {
    	$carousel->delete();
    	return response()->json('success', 200);
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index($type)
    {
    	if(!in_array($type, array_keys(config('menu.about'))))
    	{
    		abort(404);
    	}
    	$data = About::where('category', $type)->first();
   
    	return view('home.about.index', ['data' =>$data]);
    }
}

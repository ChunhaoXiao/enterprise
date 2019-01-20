<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
    	//echo request()->path();
    	$newslist = News::latest()->paginate(25);
    	return view('home.news.index', ['newslist' => $newslist]);
    }

    public function show(News $news)
    {
    	return view('home.news.show', ['news' => $news]);
    }
}

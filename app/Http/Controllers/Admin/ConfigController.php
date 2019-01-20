<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Cache;

class ConfigController extends Controller
{
    public function create()
    {
    	$configs = Config::all()->pluck('value','name')->toArray();
    	return view('admin.config.create')->with('configs', $configs);
    }

    public function store(Request $request)
    {
    	$datas = array_filter($request->except('_token'));
    	if(!empty($datas))
    	{
    		foreach ($datas as $key => $value) {
    			if($value instanceof \Illuminate\Http\UploadedFile)
    			{
    				$value = $value->store('logo');
    			}
    			Config::updateOrCreate(['name' => $key] , ['value' => $value]);
    		}
    	}
        return back()->with('success', 1);
    }

    public function edit()
    {
        return view('admin.config.clear_cache');
    }

    public function destroy()
    {
        Cache::flush();
        return redirect()->route('cacheclearform.show')->with('cleared', 1);
    }
}

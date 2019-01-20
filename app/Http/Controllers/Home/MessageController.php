<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Models\Message;

class MessageController extends Controller
{
	public function __construct()
	{
		$this->middleware('interval.check')->only('store');
	}

    public function create()
    {
    	return view('home.message.create');
    }

    public function store(MessageRequest $request)
    {
        $message = $request->all();
        $message['ip'] = $request->ip()??'unknown';
    	Message::create($message);
    	//$request->session()->flash('posted', 1);
    	return redirect()->route('message.create')->with('posted', 1);
    }
}

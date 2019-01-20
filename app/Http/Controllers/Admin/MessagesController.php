<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class MessagesController extends Controller
{
	private $message;

	public function __construct(Message $message)
	{
		$this->message = $message;
		$this->middleware(function($req, $next){
			$message = $req->message;
			$message->update(['is_read' => 1]);
			return $next($req);
		})->only('show');
	}

    public function index(Request $request)
    {
    	$messages = $this->message->search($request->all())->latest()->paginate();
    	return view('admin.message.index', ['messages' => $messages]);
    }

    public function show(Message $message)
    {
    	//$message = $this->message->findOrFail($id);
    	return $message;
    	//return view('admin.message.show', ['message' => $message]);
    }
}

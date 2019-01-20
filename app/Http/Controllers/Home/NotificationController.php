<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NotificationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$user = Auth::user();
    	$notifications = $user->notifications()->orderBy('read_at')->paginate(25);
    	//dd($notifications);
    	return view('home.notification.index', ['notifications' => $notifications]);
    }
}

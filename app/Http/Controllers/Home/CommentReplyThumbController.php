<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentReplyThumb;
use App\Models\CommentReply;
use Auth;
use Illuminate\Validation\Rule;

class CommentReplyThumbController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Request $request)
    {
    	$data = $request->validate([
    		'type' => ['required',Rule::in(['up', 'down'])],
    		'reply_id' => 'required|exists:comment_replies,id',
    	]);
    	$user = Auth::user();
    	if(!$thumb = $user->thumbs()->where($data)->first())
    	{
    		$user->thumbs()->create($data);
    		return response()->json('1'); 
    	}
    	$thumb->delete();
    	return response()->json('-1');
    }
}

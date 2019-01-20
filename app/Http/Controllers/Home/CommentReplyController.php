<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use App\Models\CommentReply;
use Auth;

class CommentReplyController extends Controller
{
	private $comment;

	public function __construct(ProductComment $comment)
	{
		$this->middleware('auth');
		$this->comment = $comment;
	}

    public function store(Request $request)
    {
    	$this->authorize('create', CommentReply::class);

    	$data = $request->validate([
    		'content' => 'required',
    		'comment_id' => 'required|exists:product_comments,id',
    	],[
    		'content.required' => '内容不能为空',
    		'comment_id.required' => '评论id错误',
    		'comment_id.exists' => '评论不存在',
    	]);

    	$data['user_id'] = Auth::id();
    	//$data['comment_id'] = $id;
    	$comment = $this->comment->findOrFail($data['comment_id']);
    	if(!$comment->reply)
    	{
    		$comment->reply()->create($data);
    	}
    	return response()->json('success', 200);
    }
}

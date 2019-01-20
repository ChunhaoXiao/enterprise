<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth; 
use Validator;
use App\Models\ProductComment;
use App\Events\ProductCommented;

class ProductCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index()
    {

    }

    public function store(Request $request, $id)
    {
    	$validator = Validator::make(
        $request->all(),
        [
    		'content' => 'required|min:5|max:300',
    	], [
    		'content.required' => '内容不能为空',
    		'content.min' => '内容长度不能小于5个字符',
    		'content.max' => '内容长度不能超过300字',
    	]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $data['content'] = $request->content;
    	$data['user_id'] = Auth::id();
    	$product = Product::findOrFail($id);
    	$comment = $product->comments()->create($data);
        event(new ProductCommented($comment));
    	return response()->json('操作成功', 200);
    }

    public function destroy($id)
    {
        $this->authorize('create', ProductComment::class);
        $comment = ProductComment::findOrFail($id);
        $comment->delete();
        return response()->json('success', 200);
    }
}

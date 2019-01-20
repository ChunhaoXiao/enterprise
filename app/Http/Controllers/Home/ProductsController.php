<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Product;
use Illuminate\View\View;
use Auth;

class ProductsController extends Controller
{
	private $productService;

	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
      //  $this->middleware('products.related')->only('show');
	}

    public function index(Request $request)
    {
    	$products = $this->productService->listProducts($request->all());
    	return view('home.product.index')->with('products', $products);
    }

    public function show(Product $product)
    {
        $uid = Auth::id();
        $comment = $product->getComments($uid);
    	return view('home.product.show', ['product' => $product]);
    }
}

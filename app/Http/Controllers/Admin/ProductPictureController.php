<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Picture;
use App\Http\Resources\PictureResource;

class ProductPictureController extends Controller
{
    public function index(Product $product)
    {
    	//$product = Product::findOrFail($product_id);
    	return PictureResource::collection($product->pictures);
    }

    public function update(Picture $picture)
    {
    	$picture->product->setCover($picture);
    	return response()->json('ok', 200);
    }
}

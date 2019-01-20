<?php 
namespace App\Services;
use App\Models\Product;
use Storage;
use App\Services\UploadService;
class ProductService
{
	private $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	public function listProducts($where = [])
	{
		$products = $this->product->search($where)->with(['category', 'cover'])->latest()->paginate();
		return $products;
	}

	public function createProduct($data)
	{
		$pictures = UploadService::uploadAll($data['pictures']);
		$product = $this->product->create($data);
		if(is_a($product, Product::class))
		{
			if(!empty($data['property']))
			{
				$product->syncProperties($data['property']);
			}

			$product->syncPictures($pictures);
		}
		return $product;
	}

	public function updateProduct($data, $id)
	{	
		$product = $this->findProductById($id);
		if(!empty($data['pictures']))
		{
			$newPictures = UploadService::uploadAll($data['pictures']);
		}
		$newPictures = $newPictures ?? [];
		$oldPictures = $data['oldpicture'] ?? [];
		$allPictures = array_merge($newPictures, $oldPictures);
		$product->update($data);
		if(!empty($data['property']))
		{
			$product->syncProperties($data['property']);
		}
		$product->syncPictures($allPictures);
		return $product;
	}

	public function findProductById($id)
	{
		return $this->product->findOrFail($id);
	}

	public function delete($id)
	{
		$product = $this->findProductById($id);
		$product->properties()->detach();
		$product->pictures()->delete();
		$product->delete();
		return true;
	}
}
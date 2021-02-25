<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Product\ProductRepository;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function products(Request $request)
    {
        $products = $this->productRepo->with(['subCategories', 'colors','imageDefault','images', 'sale'])
            ->listProducts();

        return ProductResource::collection($products);
    }

    public function getProduct($id)
    {
        $product = $this->productRepo->with(['subCategories', 'colors','imageDefault','images', 'sale'])
            ->findById($id);

        return $this->respondWithData(new ProductResource($product));
    }
}
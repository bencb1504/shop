<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Traits\HttpClientApi;
use JWTAuth;
use Auth;

class ProductController extends Controller
{
    use HttpClientApi;

    public $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        return view('web.products');
    }

    public function detail($id)
    {
        $user = Auth::user();
       
        $product = $this->productRepo->with(['colors','images'])->findById($id);

        return view('web.product_detail', compact('product'));
    }
}
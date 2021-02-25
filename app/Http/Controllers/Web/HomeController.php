<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Traits\HttpClientApi;
use Auth;

class HomeController extends Controller
{
    use HttpClientApi;

    public $categoryRepo;
    public $productRepo;

    public function __construct(
        CategoryRepositoryInterface $categoryRepo,
        ProductRepositoryInterface $productRepo
        )
    {
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    public function index(Request $request)
    {
        // dd(rand(1,2,3,4));
        $params = ['per_page' => 15];
        try {
            $categories = $this->categoryRepo->with('subCategories')->getAll();
            $productSales = $this->productRepo->with(['subCategories', 'colors','imageDefault'])->getProductSales(10);
            $productHots = $this->productRepo->with(['subCategories', 'colors','imageDefault'])->getProductHots(10);
            $productSpecials = $this->productRepo->with(['subCategories', 'colors','imageDefault'])->getProductSpecials(10);
            
            $data = $this->getApi('api/v1/products',$params);
            $listProducts = isset($data['data']) ? $data['data'] : [];
            $links = isset($data['links']) ? $data['links'] : [];
            $nextPage = (!empty($links['next'])) ? $links['next']  : '';
        } catch (\Exception $e) {
            abort(500);
        }

        return view('web.index', compact('productSales', 'productSpecials', 'productHots', 'listProducts', 'nextPage'));
    }

    public function loadMoreListCast(Request $request)
    {
        $url = $request->next_page;
        $data = $this->getApi($url);

        $products = isset($data['data']) ? $data['data'] : [];
        $links = isset($data['links']) ? $data['links'] : [];
        $nextPage = (!empty($links['next'])) ? $links['next']  : '';

        return [
            'next_page' => $nextPage,
            'view' => view('web.load_more_list_products', compact('products'))->render(),
        ];
    }
}

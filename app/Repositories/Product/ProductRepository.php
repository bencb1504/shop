<?php 
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\User;
use App\Models\Rating;
use App\Models\Sale;
use App\Models\Order;
use App\Enums\ProductShow;
use App\Enums\ProductSale;
use App\Enums\ProductHot;
use App\Enums\ProductSpecial;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public $request;
    public function __construct(Product $model, Request $request)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        $this->request = $request;

        parent::__construct($model);
        //call construct of class BaseRepository
    }

    public function isShow()
    {
        return $this->model->where('is_show', ProductShow::SHOW);
    }
    
    public function getProductSales($limit)
    {
        $this->newQuery()->eagerLoadRelations(); // $this->newQuery() da gan $this->model thanh 1 cau query roi

        $productSales =  $this->isShow()
            ->where('is_sale', ProductSale::SALE)
            ->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();

        $this->model = $this->currentModel;
        // tra lai model la Product de goi tiep cac function khac ma ko bị nối câu sql.
        $this->with = [];

        return $productSales;
    }

    public function getProductHots($limit)
    {
        $this->newQuery()->eagerLoadRelations();

        $productHosts = $this->isShow()
            ->where('is_hot', ProductHot::HOT)
            ->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();

        $this->model = $this->currentModel;
        $this->with = [];

        return $productHosts;
    }

    public function getProductSpecials($limit)
    {
        $this->newQuery()->eagerLoadRelations();

        $productSpecials = $this->isShow()
            ->where('is_special', ProductSpecial::SPECIAL)
            ->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();
        
        $this->model = $this->currentModel;
        $this->with = [];

        return $productSpecials;
    }

    public function listProducts()
    {
        $products = $this->newQuery()->eagerLoadRelations()->isShow();

        $params =  $this->request->only([
            'name'
        ]);

        if(!empty($params)) {
            foreach ($params as $key => $value) {
                $products->where($key, $value);
            }
        }

        $products = $products->paginate($this->request->per_page ? $this->request->per_page : 5)->appends($this->request->query());
        $this->model = $this->currentModel;
        $this->with = [];

        return $products;
    }
}
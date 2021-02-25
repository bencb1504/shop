<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Traits\HttpClientApi;

class CategoryComposer
{
    use HttpClientApi;
    /**
     * The user repository implementation.
     *
     * @var  UserRepository
     */
    protected $categories;
    protected $productSales;
    protected $productHots;
    protected $productSpecials;

    /**
     * Create a new profile composer.
     *
     * @param    UserRepository  $users
     * @return  void
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepo,
        ProductRepositoryInterface $productRepo
        )
    {
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;

        $this->getData();
    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        $view->with('categoryComposers', $this->categories);
        $view->with('productSaleComposers', $this->productSales);
        $view->with('productHotComposers', $this->productHots);
        $view->with('productSpecialComposers', $this->productSpecials);
    }

    public function getData()
    {
        $params = ['per_page' => 15];
        try {
            $this->categories = $this->categoryRepo->with('subCategories')->getAll();
            $this->productSales = $this->productRepo->with(['subCategories', 'colors','imageDefault'])->getProductSales(10);
            $this->productHots = $this->productRepo->with(['subCategories', 'colors','imageDefault'])->getProductHots(10);
            $this->productSpecials = $this->productRepo->with(['subCategories', 'colors','imageDefault'])->getProductSpecials(10);
        } catch (\Exception $e) {
            abort(500);
        }
    }
}

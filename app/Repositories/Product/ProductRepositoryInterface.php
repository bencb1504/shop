<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductSales($limit);
    public function getProductHots($limit);
    public function getProductSpecials($limit);
}
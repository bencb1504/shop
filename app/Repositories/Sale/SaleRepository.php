<?php 
namespace App\Repositories\Sale;

use App\Repositories\BaseRepository;
use App\Repositories\Sale\SaleRepositoryInterface;
use App\Models\Sale;

class SaleRepository extends BaseRepository implements SaleRepositoryInterface
{
    public function __construct(Sale $model)  // override func construct of class parent (BaseRepository)
    {
        parent::__construct($model);
        //call construct of class BaseRepository
    }
}
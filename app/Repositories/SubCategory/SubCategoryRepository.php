<?php 
namespace App\Repositories\SubCategory;

use App\Repositories\BaseRepository;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryRepository extends BaseRepository implements SubCategoryRepositoryInterface
{
    public $model;
    
    public function __construct(SubCategory $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }
}
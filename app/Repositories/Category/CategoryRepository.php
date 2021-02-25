<?php 
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }
}
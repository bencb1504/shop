<?php 
namespace App\Repositories\Color;

use App\Repositories\BaseRepository;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Models\Color;
use App\Models\Product;

class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{
    public $model;

    public function __construct(Color $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }
}
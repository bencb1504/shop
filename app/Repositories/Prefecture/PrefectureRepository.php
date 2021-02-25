<?php 
namespace App\Repositories\Prefecture;

use App\Repositories\BaseRepository;
use App\Repositories\Prefecture\PrefectureRepositoryInterface;
use App\Models\Prefecture;
use App\Models\User;
use App\Models\Order;

class PrefectureRepository extends BaseRepository implements PrefectureRepositoryInterface
{
    public $model;

    public function __construct(Prefecture $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }
}
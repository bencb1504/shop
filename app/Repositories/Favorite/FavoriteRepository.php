<?php 
namespace App\Repositories\Favorite;

use App\Repositories\BaseRepository;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Models\Favorite;

class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    public $model;
    
    public function __construct(Favorite $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }
}
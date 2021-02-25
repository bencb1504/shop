<?php 
namespace App\Repositories\Rating;

use App\Repositories\BaseRepository;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Models\Rating;
use App\Models\User;
use App\Models\Product;

class RatingRepository extends BaseRepository implements RatingRepositoryInterface
{
    public $model;

    public function __construct(Rating $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }

    public function user()
    {
        return $this->model->belongsTo(User::class);
    }

    public function product() {
        return $this->model->belongsTo(Product::class);
    }
}
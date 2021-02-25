<?php 
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\Product;
use App\Models\Prefecture;
use App\Models\User;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public $model;

    public function __construct(Order $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of class BaseRepository
    }

    public function prefecture()
    {
        return $this->model->belongsTo(Prefecture::class);
    }

    public function products()
    {
        return $this->model->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->model->belongsTo(User::class);
    }
    
}
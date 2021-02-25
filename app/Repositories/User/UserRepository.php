<?php 
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Prefecture;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public $model;

    public function __construct(User $model)  // override func construct of class parent (BaseRepository)
    {
        $this->model = $model;
        parent::__construct($model);
        //call construct of BaseRepository and add model User.
    }

    public function getNickName($id)
    {
        return $this->findById($id)->nickname; 
    }

    public function orders()
    {
        return $this->model->hasMany(Order::class);
    }

    public function favorites()
    {
        return $this->model->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id')
            ->withPivot('id', 'user_id', 'product_id', 'created_at', 'updated_at');
    }

    public function prefecture() {
        return $this->model->belongsTo(Prefecture::class);
    }
}
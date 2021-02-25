<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'categories_id',
        'name',
        'type',
        'sub_categories_id',
        'active',
    ];

    public function category() {
        return $this->model->belongsTo(Category::class);
    }

    public function products() {
        return $this->model->hasMany(Product::class);
    }
}

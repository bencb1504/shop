<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\SubCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_categories_id',
        'sale_id',
        'name',
        'title',
        'detail',
        'capacity',
        'price',
        'is_hot',
        'is_sale',
        'number',
        'is_special',
        'is_show',
        'type',
        'date',
        'country'
    ];

    public function favoriters()
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')
            ->withPivot('id', 'user_id', 'product_id', 'created_at', 'updated_at');
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function sale() {
        return $this->belongsTo(Sale::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class,'color_product', 'product_id', 'color_id');
    }

    public function subCategories() {
        return $this->belongsTo(SubCategory::class,'sub_categories_id');
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function imageDefault() {
        return $this->hasMany(Image::class)->where('is_default', true);
    }
}

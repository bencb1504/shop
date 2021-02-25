<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\SubCategory\SubCategoryRepository;
use App\Repositories\Prefecture\PrefectureRepository;
use App\Http\Resources\ImageResource;
use App\Http\Resources\SaleResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sub_categories_id' => $this->sub_categories_id,
            'subCategory' => $this->sub_categories_id ? app(SubCategoryRepository::class)->findById($this->sub_categories_id)->name : '',
            'prefecture_id' => $this->prefecture_id,
            'prefecture' => $this->prefecture_id ? app(PrefectureRepository::class)->findById($this->prefecture_id)->name : '',
            'sale_id' => $this->sale_id,
            'title' =>$this->title,
            'name' => $this->name,
            'detail' => $this->detail,
            'capacity' => $this->capacity,
            'price' => $this->price,
            'number' => $this->number,
            'max_buy' => $this->max_buy,
            'image' => ImageResource::collection($this->whenLoaded('images')),
            'imageDefault' => ImageResource::collection($this->whenLoaded('imageDefault')),
            'sale' => ($this->sale_id && $this->is_sale) ? SaleResource::make($this->whenLoaded('sale')) : '',
            'is_hot' => $this->is_hot,
            'is_sale' => $this->is_sale,
            'is_special' => $this->is_special,
            'type' => $this->type,
            'date' => $this->date,
            'country' => $this->country,
        ];
    }
}

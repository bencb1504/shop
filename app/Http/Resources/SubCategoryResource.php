<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\Category\CategoryRepository;
use Carbon\Carbon;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'categories_id' => $this->categories_id,
            'category' => $this->categories_id ? app(CategoryRepository::class)->findById($this->categories_id)->name : '',
            'sub_categories_id' => $this->sub_categories_id ? $this->sub_categories_id : '',
            'name' => $this->name,
            'type' => $this->type,
            'active' => $this->active,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i'),
        ];
    }
}

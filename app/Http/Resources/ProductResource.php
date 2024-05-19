<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'category_title'=>$this->category->title,
//            'category_title'=>new CategoryResource($this->category), to return product's category with all items
            'name'=>$this->name,
            'picture'=>$this->picture,
            'short_description'=>$this->short_description,
            'full_description'=>$this->full_description,
            'created_at'=>$this->created_at,
        ];
    }
}

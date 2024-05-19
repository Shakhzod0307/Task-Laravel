<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'picture'=>$this->picture,
            'short_description'=>$this->short_description,
            'full_description'=>$this->full_description,
            'created_at'=>$this->created_at,
        ];
    }
}

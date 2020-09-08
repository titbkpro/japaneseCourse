<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $category = $this->category;

        return [
            'id' => $this->id,
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
            'title' => $this->title,
            'content' => $this->content,
            'status' => [
                'id' => $this->status,
                'name' => __("data.information.status.$this->status"),
            ],
            // 'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

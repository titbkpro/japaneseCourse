<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbacksResourcce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = $this->image;
        return [
            'id' => $this->id,
            'image' => [
                'id' => $image->id,
                'url' => $image->url,
                'name' => $image->name,
            ],
            'created_at' => $this->created_at,
        ];
    }
}

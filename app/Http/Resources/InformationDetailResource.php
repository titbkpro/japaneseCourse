<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformationDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $info = $this->info;
        return [
            'id' => $this->id,
            'info' => [
                'id' => $info->id,
                'name' => $info->name,
            ],
            'title' => $this->title,
            'content' => $this->content,
            'status' => [
                'id' => $this->status,
                'name' => __("data.information.status.$this->status"),
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

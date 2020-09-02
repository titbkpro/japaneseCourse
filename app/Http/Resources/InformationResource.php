<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $infoDetails = $this->infoDetails()->get();
        return [
            'id' => $this->id,
            'description' => $this->description,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'info_details' => InformationDetailResource::collection($infoDetails),
        ];
    }
}

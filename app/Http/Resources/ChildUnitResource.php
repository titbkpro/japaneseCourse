<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class ChildUnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parentUnit = $this->parentUnit;
        $childrenUnits = $this->childrenUnits;
        Log::info("=============================childrenUnits=============");
        Log::info($this->id);
        Log::info($childrenUnits);
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}

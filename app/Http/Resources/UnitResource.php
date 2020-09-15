<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Log::info("=============================current Unit=============");
        Log::info($this->id);
        $parentUnit = $this->parent;
        Log::info("=============================parentUnit=============");
        Log::info($parentUnit);
        $childrenUnits = $this->children;
        Log::info("=============================childrenUnits=============");
        Log::info($childrenUnits);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_unit' => $parentUnit ? [
                'id' => $parentUnit->id,
                'name' => $parentUnit->name,
            ] : null,
            'children_units' => UnitResource::collection($childrenUnits),
        ];
    }
}

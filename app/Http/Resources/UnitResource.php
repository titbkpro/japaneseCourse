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
        $parentUnit = $this->parent;
        $childrenUnits = $this->children;
        $courses = $this->courses;
        $combos = $this->combos;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_unit' => $parentUnit ? [
                'id' => $parentUnit->id,
                'name' => $parentUnit->name,
            ] : null,
            'children_units' => UnitResource::collection($childrenUnits),
            'course' => ($courses->isNotEmpty()) ? [
                'id' => $courses->first()->id,
                'name' => $courses->first()->name,
            ] : null,
            'combo' => ($combos->isNotEmpty()) ? [
                'id' => $combos->first()->id,
                'name' => $combos->first()->name,
            ] : null ,
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Unit;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $unit = $this->resource;
        $children = Unit::where('parent_unit_id', $unit->id)->get();
        $children = $children->isNotEmpty() ? UnitDetailResource::collection($children) : null;

        return [
            'id' => $unit->id,
            'name' => $unit->name,
            'children' => $children ? $children->toArray(null) : [],
            'lesson' => $children ? [] : LessonResource::collection($unit->lessons)->toArray(null),
        ];
    }
}

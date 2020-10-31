<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Combo;
use App\Models\Course;
use App\Models\Unit;

class UnitManageService extends BaseService
{
    public function getAllUnits()
    {
        return Unit::all();
    }

    public function getUnitById($unitId)
    {
        return Unit::find($unitId);
    }

    public function addNewUnit($unitInput)
    {
        $unit =  Unit::create($unitInput);

        $courses = Course::find($unitInput['course_id']);
        if ($courses) {
            $unit->courses()->attach($courses);
        }

        $combos = Combo::find($unitInput['combo_id']);
        if ($combos) {
            $unit->combos()->attach($combos);
        }
    }

    public function updateUnit($unitInput, $unitId)
    {
        $unit = Unit::find($unitId);
        if($unit) {
            $unit->update($unitInput);

            if (!empty($unitInput['course_id'])) {
                $courses = Course::find($unitInput['course_id']);
                if ($courses) {
                    $unit->courses()->attach($courses);
                }
            }
    
            if (!empty($unitInput['combo_id'])) {
                $combos = Combo::find($unitInput['combo_id']);
                if ($combos) {
                    $unit->combos()->attach($combos);
                }
            }
        } else {
            throw new WebException('update_unit_error');
        }
    }

    public function deleteUnit($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        if ($unit) {
            $unit->delete();
        } else {
            throw new WebException('delete_unit_error');
        }
    }
}

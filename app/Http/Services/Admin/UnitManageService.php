<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
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
        return Unit::create($unitInput);
    }

    public function updateUnit($unitInput, $unitId)
    {
        $unit = Unit::find($unitId);
        if($unit) {
            $unit->update($unitInput);
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

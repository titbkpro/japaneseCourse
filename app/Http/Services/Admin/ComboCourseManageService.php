<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Combo;

class ComboCourseManageService extends BaseService
{
    public function getAllComboCourses()
    {
        return Combo::all();
    }

    public function getComboCourseById($comboId)
    {
        return Combo::find($comboId);
    }

    public function addNewComboCourse($comboInput)
    {
        Combo::create($comboInput);
    }

    public function updateComboCourse($comboInput, $comboId)
    {
        $combo = Combo::find($comboId);
        if($combo) {
            $combo->update($comboInput);
        } else {
            throw new WebException('update_combo_course_error');
        }
    }

    public function deleteComboCourse($id)
    {
        $combo = Combo::findOrFail($id);
        if ($combo) {
            $combo->delete();
        } else {
            throw new WebException('delete_combo_course_error');
        }
    }
}

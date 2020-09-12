<?php

namespace App\Http\Services\Admin;

use App\Exceptions\WebException;
use App\Models\Combo;
use App\Models\Course;

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
        $combo = Combo::create($comboInput);

        $courses = Course::find($comboInput['course_id']);

        $combo->courses()->attach($courses);
    }

    public function updateComboCourse($comboInput, $comboId)
    {
        $combo = Combo::find($comboId);
        if($combo) {
            $combo->update($comboInput);

            $courses = Course::find($comboInput['course_id']);
            $combo->courses()->sync($courses);
        } else {
            throw new WebException('update_combo_course_error');
        }
    }

    public function deleteComboCourse($id)
    {
        $combo = Combo::findOrFail($id);
        if ($combo) {
            $combo->delete();
            $combo->courses()->detach();
        } else {
            throw new WebException('delete_combo_course_error');
        }
    }
}

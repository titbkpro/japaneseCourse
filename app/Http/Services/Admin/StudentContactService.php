<?php

namespace App\Http\Services\Admin;

use Log;
use Exception;
use App\Models\StudentContact;
use App\Exceptions\WebException;

class StudentContactService extends BaseService
{
    /**
     * Get all student contact
     *
     * @return StudentContact
     */
    public function getAllStudentContacts()
    {
        return StudentContact::orderBy('updated_at', 'DESC')->orderBy('id')->get();
    }

    /**
     * Store StudentContact
     *
     * @return StudentContact
     */
    public function store($inputs)
    {
        try {
            StudentContact::create($inputs);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('store_error');
        }
    }

    /**
     * Update StudentContact
     *
     * @return StudentContact
     */
    public function update($id, $inputs) {
        $studentContact = StudentContact::findOrFail($id);

        if ($studentContact) {
            $studentContact->update($inputs);
        } else {
            throw new WebException('update_error');
        }
    }

    /**
     * Delete StudentContact
     *
     * @return StudentContact
     */
    public function delete($id) {
        $studentContact = StudentContact::findOrFail($id);

        try {
            $studentContact->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }
}

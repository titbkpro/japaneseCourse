<?php

namespace App\Http\Services\Admin;

use Log;
use Exception;
use App\Models\Contact;
use App\Exceptions\WebException;

class ContactService extends BaseService
{
    /**
     * Get all information
     *
     * @return Contact
     */
    public function getAllContacts()
    {
        return Contact::orderBy('status', 'DESC')->orderBy('id')->get();
    }

    /**
     * Store Contact
     *
     * @return Contact
     */
    public function store($inputs)
    {
        try {
            if ((int)$inputs['status'] === Contact::SHOW) {
                Contact::where('status', Contact::SHOW)->update(['status' => Contact::NOT_SHOW]);
            }

            Contact::create(array_merge([
                'description' => 'description',
            ], $inputs));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('store_error');
        }
    }

    /**
     * Update Contact
     *
     * @return Contact
     */
    public function update($id, $inputs) {
        $contact = Contact::findOrFail($id);

        if ($contact) {
            if ((int)$inputs['status'] === Contact::SHOW) {
                Contact::where('status', Contact::SHOW)->update(['status' => Contact::NOT_SHOW]);
            }

            $contact->update($inputs);
        } else {
            throw new WebException('update_error');
        }
    }

    /**
     * Delete Contact
     *
     * @return Contact
     */
    public function delete($id) {
        $contact = Contact::findOrFail($id);

        try {
            $contact->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new WebException('delete_error');
        }
    }
}

<?php

namespace App\Helpers\FormRules;

class Form1_16Rules
{
    public static function rules(): array
    {

        return [
            'rules' => [
                // Transport Details
                'place_of_origin' => ['required', 'string'],
                'purpose' => ['required', 'string'],
                'destination' => ['required', 'string'],

                // Applicantion Information
                'applicant' => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'permit_rsl_no' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => ['nullable', 'email'],
                // Proposed Equipment
                'equipment1_make' => ['required', 'string'],
                'equipment1_serial' => ['required', 'string'],
                'equipment2_make' => ['required', 'string'],
                'equipment2_serial' => ['required', 'string'],
                'equipment3_make' => ['required', 'string'],
                'equipment3_serial' => ['required', 'string'],

            ],

            'messages' => [],

            'attributes' => []
        ];
    }
}

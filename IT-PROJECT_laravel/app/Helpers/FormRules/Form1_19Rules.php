<?php

namespace App\Helpers\FormRules;

class Form1_19Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                //Type Equipment
                'equipment_type' => ['required', 'string'],

                // Applicant Details
                'applicant' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => ['nullable', 'email'],
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'permit_import_no' => ['required', 'string'],
                'invoice_no' => ['required', 'string'],
                'cpcn_pa_rsl_no' => ['required', 'string'],

                //Equipment and Devices
                'equipment1_make' => ['required', 'string'],
                'equipment1_quantity' => ['required', 'numeric'],
                'equipment1_serial' => ['required', 'string'],
            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 

        ];
    }
}

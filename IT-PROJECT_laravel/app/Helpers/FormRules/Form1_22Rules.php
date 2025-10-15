<?php

namespace App\Helpers\FormRules;

class Form1_22Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                //Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'license_type' => ['required', 'string'],
                'applicant_classification' => ['required', 'string'],
                'service_type' => ['required', 'string'],
                'others_service' => ['nullable', 'string'],
                'no_of_years' => ['required', 'string'],

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
                'pa_ca_no' => ['required', 'string'],
                'service_area' => ['required', 'string'],
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'latitude' => ['required', 'string'],

            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 

            'attributes' => [
                'dob' => 'date of birth', // custom attribute name
            ]
        ];
    }
}

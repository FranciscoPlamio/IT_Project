<?php

namespace App\Helpers\FormRules;

class Form1_20Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [

                //Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'service_category' => ['required', 'string'],

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
                'cpcn_pa_ca_no' => ['required', 'numeric'],
                'cpcn_validity' => ['required', 'string'],
                'cor_no' => ['required', 'numeric'],
                'cor_validity' => ['required', 'string'],
                'known_by_another_name' => ['required', 'string'],
                'former_name' => ['required', 'string'],

                // Value added service
                'vas_services' => ['required', 'string'],
                'others_vas' => ['required', 'string'],

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

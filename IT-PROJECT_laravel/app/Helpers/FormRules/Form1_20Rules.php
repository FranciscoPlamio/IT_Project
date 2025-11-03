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
                'cpcn_pa_ca_no' => ['required', 'string'],
                'cpcn_validity' => ['required', 'date', 'after_or_equal:today'],
                'cor_no' => ['required', 'string'],
                'cor_validity' => ['required', 'date', 'after_or_equal:today'],
                'known_by_another_name' => ['required', 'string'],
                'former_name' => ['nullable', 'string'],

                // Value added service
                'vas_services' => ['required', 'string'],
                'others_vas' => ['nullable', 'string'],

            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 

        ];
    }
}

<?php

namespace App\Helpers\FormRules;

class Form1_18Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                //Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'application_category' => ['required', 'string'],

                //Applicant Details
                'applicant' => ['required', 'string'],
                'permit_no' => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'entity_type' => ['required', 'string'],
                'others_entity' => ['nullable', 'string'],
                // 8 Address
                'unit' => ['nullable', 'string'],
                'street' => ['nullable', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => [
                    'required',
                    'email',
                    'min:6',
                    'max:30',
                    'regex:/^[A-Za-z0-9](?:[A-Za-z0-9\.]{4,28}[A-Za-z0-9])@(gmail|yahoo|outlook)\.com$/i'
                ],
                //Personell Required
                'supervising_engineer_name' => ['required', 'string'],
                'supervising_engineer_pece' => ['required', 'string'],
                'supervising_engineer_validity' => ['required', 'date', 'after_or_equal:today'],
                'technician_name' => ['required', 'string'],
                'technician_certificate' => ['required', 'string'],
                'technician_validity' => ['required', 'date', 'after_or_equal:today'],
            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 
            'attributes' => []
        ];
    }
}

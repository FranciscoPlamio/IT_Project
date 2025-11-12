<?php

namespace App\Helpers\FormRules;

class Form1_21Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                // Applicant Details
                'applicant' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => ['required', 'email', 'regex:/^[A-Za-z0-9](?:[A-Za-z0-9\.]{4,28}[A-Za-z0-9])?@(gmail|yahoo|outlook)\.com$/i',],

                //Permit License Details
                'permit_license_certificate_no' => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],

                //Circumstances
                'circumstances' => ['required', 'string'],

            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 
            'attributes' => []
        ];
    }
}

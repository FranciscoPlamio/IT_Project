<?php

namespace App\Helpers\FormRules;

class Form1_25Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                // Complainant Details
                'complainant_name' => ['required', 'string'],
                'postal_address' => ['required', 'string'],
                'email_address' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],

                // Service Provider
                'business_name' => ['required', 'string'],
                'business_address' => ['required', 'string'],
                'provider_contact_number' => ['required', 'string'],

                // Nature of Complaint
                'complaint_type' => ['required', 'string'],
                'complaint_type_others' => ['nullable', 'string'],
                'incident_date' => ['required', 'string'],
                'incident_time' => ['required', 'string'],

                // Complaint Details
                'complaint_details' => ['required', 'string'],

                // Supporting Documents
                'supporting_documents' => ['required', 'string'],
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

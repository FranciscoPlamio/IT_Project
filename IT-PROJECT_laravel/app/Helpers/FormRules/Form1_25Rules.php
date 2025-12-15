<?php

namespace App\Helpers\FormRules;

class Form1_25Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Complainant Details - name validation (letters only)
                'complainant_name' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'postal_address' => ['required', 'string'],
                'email_address' => self::emailRules(required: true, minLength: 6, maxLength: 30),
                
                // Contact number - must be 11-digit PH mobile starting with 09
                'contact_number' => self::phMobileRules(required: true),

                // Service Provider
                'business_name' => ['required', 'string'],
                'business_address' => ['required', 'string'],
                'provider_contact_number' => ['required', 'string'],

                // Nature of Complaint
                'complaint_type' => ['required', 'string'],
                'complaint_type_others' => ['nullable', 'string'],
                'incident_date' => ['required', 'date'],
                'incident_time' => ['required', 'string'],

                // Complaint Details
                'complaint_details' => ['required', 'string', 'min:10'],

                // Supporting Documents
                'supporting_documents' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'complainant_name.regex' => 'Complainant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'complaint_details.min' => 'Complaint details must be at least 10 characters.',
                ]
            ),
            
            'attributes' => [
                'email_address' => 'email',
            ]
        ];
    }
}

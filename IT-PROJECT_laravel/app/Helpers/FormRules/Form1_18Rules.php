<?php

namespace App\Helpers\FormRules;

class Form1_18Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'application_category' => ['required', 'string'],

                // Applicant Details - name validation (letters only)
                'applicant' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'permit_no' => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'entity_type' => ['required', 'string'],
                'others_entity' => ['nullable', 'string'],
                
                // Address fields
                'unit' => ['nullable', 'string'],
                'street' => ['nullable', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                
                // Contact number - must be 11-digit PH mobile starting with 09
                'contact_number' => self::phMobileRules(required: true),
                
                // Email - Gmail, Yahoo, or Outlook only
                'email' => self::emailRules(required: true, minLength: 6, maxLength: 30),
                
                // Personnel Required - names (letters only)
                'supervising_engineer_name' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'supervising_engineer_pece' => ['required', 'string'],
                'supervising_engineer_validity' => ['required', 'date', 'after_or_equal:today'],
                'technician_name' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'technician_certificate' => ['required', 'string'],
                'technician_validity' => ['required', 'date', 'after_or_equal:today'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'supervising_engineer_name.regex' => 'Supervising engineer name must contain only letters, spaces, hyphens, or apostrophes.',
                    'technician_name.regex' => 'Technician name must contain only letters, spaces, hyphens, or apostrophes.',
                ]
            ),
            
            'attributes' => []
        ];
    }
}

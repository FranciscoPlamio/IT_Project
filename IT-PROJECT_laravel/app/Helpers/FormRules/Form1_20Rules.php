<?php

namespace App\Helpers\FormRules;

class Form1_20Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'service_category' => ['required', 'string'],

                // Applicant Details - name validation (letters only)
                'applicant' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                
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
                
                'cpcn_pa_ca_no' => ['required', 'string'],
                'cpcn_validity' => ['required', 'date', 'after_or_equal:today'],
                'cor_no' => ['required', 'string'],
                'cor_validity' => ['required', 'date', 'after_or_equal:today'],
                'known_by_another_name' => ['required', 'string'],
                'former_name' => self::nameRules(required: false, minLength: 2, maxLength: 100),

                // Value added service
                'vas_services' => ['required', 'string'],
                'others_vas' => ['nullable', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'former_name.regex' => 'Former name must contain only letters, spaces, hyphens, or apostrophes.',
                ]
            ),
            
            'attributes' => []
        ];
    }
}

<?php

namespace App\Helpers\FormRules;

class Form1_21Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
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
                
                // Permit License Details
                'permit_license_certificate_no' => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],

                // Circumstances
                'circumstances' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                ]
            ),
            
            'attributes' => []
        ];
    }
}

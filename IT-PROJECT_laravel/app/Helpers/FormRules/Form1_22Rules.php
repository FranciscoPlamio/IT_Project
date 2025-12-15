<?php

namespace App\Helpers\FormRules;

class Form1_22Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'license_type' => ['required', 'string'],
                'applicant_classification' => ['required', 'string'],
                'service_type' => ['required', 'string'],
                'others_service' => ['nullable', 'string'],
                'no_of_years' => self::integerRules(required: true, min: 1, max: 10),

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
                
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'pa_ca_no' => ['required', 'string'],
                'service_area' => ['required', 'string'],
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'latitude' => ['required', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'no_of_years.integer' => 'Number of years must be a whole number.',
                    'longitude.regex' => 'Longitude must be a valid coordinate.',
                    'latitude.regex' => 'Latitude must be a valid coordinate.',
                ]
            ),
            
            'attributes' => []
        ];
    }
}

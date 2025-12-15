<?php

namespace App\Helpers\FormRules;

class Form1_16Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Transport Details
                'place_of_origin' => ['required', 'string'],
                'purpose' => ['required', 'string'],
                'destination' => ['required', 'string'],

                // Application Information - name validation (letters only)
                'applicant' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'permit_rsl_no' => ['required', 'string'],
                
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
                
                // Proposed Equipment
                'equipment1_make' => ['required', 'string'],
                'equipment1_serial' => ['required', 'string'],
                'equipment2_make' => ['required', 'string'],
                'equipment2_serial' => ['required', 'string'],
                'equipment3_make' => ['required', 'string'],
                'equipment3_serial' => ['required', 'string'],
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

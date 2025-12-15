<?php

namespace App\Helpers\FormRules;

class Form1_19Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Type Equipment
                'equipment_type' => ['required', 'string'],

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
                'permit_import_no' => ['required', 'string'],
                'invoice_no' => ['required', 'string'],
                'cpcn_pa_rsl_no' => ['required', 'string'],

                // Equipment and Devices
                'equipment1_make' => ['required', 'string'],
                'equipment1_quantity' => self::integerRules(required: true, min: 1),
                'equipment1_serial' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'equipment1_quantity.integer' => 'Quantity must be a whole number.',
                    'equipment1_quantity.min' => 'Quantity must be at least 1.',
                ]
            ),
            
            'attributes' => []
        ];
    }
}

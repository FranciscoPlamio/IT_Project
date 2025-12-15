<?php

namespace App\Helpers\FormRules;

class Form1_26Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Affiant Details - name validation (letters only)
                'affiant_name' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'civil_status' => ['required', 'string'],
                'residence_address' => ['required', 'string'],

                // Text Messages - phone number validation
                'message1_datetime' => ['required', 'string'],
                'message1_phone' => self::phMobileRules(required: true),
                'message1_content' => ['required', 'string'],

                // Complaint Against
                'complaint_against' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'affiant_name.regex' => 'Affiant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'message1_phone.regex' => 'Phone number must be a valid 11-digit Philippine mobile number starting with 09.',
                ]
            ),

            'attributes' => []
        ];
    }
}

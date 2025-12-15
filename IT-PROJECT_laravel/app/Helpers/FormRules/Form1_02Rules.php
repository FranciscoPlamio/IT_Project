<?php

namespace App\Helpers\FormRules;

class Form1_02Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Applicant Details - Using strict name validation (letters only, no numbers)
                'last_name' => self::nameRules(required: true, minLength: 2, maxLength: 50),
                'first_name' => self::nameRules(required: true, minLength: 2, maxLength: 50),
                'middle_name' => self::nameRules(required: true, minLength: 2, maxLength: 50),

                // Date of birth with age validation
                'dob' => self::dobRules(required: true, minAge: 18, maxAge: 70),

                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],

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

                // Exam fields
                'exam_place' => ['required', 'string'],
                'exam_date' => ['required', 'date', 'before_or_equal:today'],
                'rating' => self::numericRules(required: true, min: 0, max: 100),

                // Physical measurements - numeric only
                'height' => self::numericRules(required: true, min: 50, max: 300),
                'weight' => self::numericRules(required: true, min: 20, max: 500),

                'employment_status' => ['required', 'string'],
                'employment_type' => ['required', 'string'],
                'application_type' => ['required', 'string'],
                'modification_reason' => ['required_if:application_type,modification', 'string', 'nullable'],
                'years' => self::integerRules(required: true, min: 1, max: 10),
                'certificate_type' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'rating.numeric' => 'Rating must be a number.',
                    'rating.min' => 'Rating must be at least 0.',
                    'rating.max' => 'Rating cannot exceed 100.',
                    'height.numeric' => 'Height must be a number (in cm).',
                    'weight.numeric' => 'Weight must be a number (in kg).',
                    'years.integer' => 'Years must be a whole number.',
                    'years.min' => 'Years must be at least 1.',
                ]
            ),

            'attributes' => [
                'dob' => 'date of birth',
            ]
        ];
    }
}

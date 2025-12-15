<?php

namespace App\Helpers\FormRules;

class Form1_03Rules
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

                // Application type fields
                'application_type' => ['required', 'string'],
                'modification_reason' => ['required_if:application_type,modification', 'string', 'nullable'],
                'years' => ['required_unless:certificate_type,at-lifetime-new,at-lifetime-modification', 'integer', 'min:1', 'max:10'],

                // Exam fields
                'exam_place' => ['required', 'string'],
                'exam_date' => ['required', 'date', 'before_or_equal:today'],
                'rating' => self::numericRules(required: true, min: 0, max: 100),

                'atroc_arsl_no' => ['required_if:application_type,modification,renewal', 'string', 'nullable'],
                'call_sign' => ['required_if:application_type,modification,renewal', 'string', 'nullable'],
                'validity' => ['required_if:application_type,modification,renewal', 'date', 'after_or_equal:today', 'nullable'],
                'station_class' => ['required_if:certificate_type,atrsl-new,atrsl-renew-mod,temporary-foreign', 'string', 'nullable'],
                'certificate_type' => ['required', 'string'],
                'club_name' => ['nullable', 'string'],
                'assigned_frequency' => ['nullable', 'string'],
                'preferred_call_sign' => ['nullable', 'string'],

                // Equipment
                'equipment_make_1' => ['required', 'string'],
                'equipment_type_1' => ['required', 'string'],
                'equipment_serial_1' => ['required', 'string'],
                'equipment_freq_1' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'rating.numeric' => 'Rating must be a number.',
                    'rating.min' => 'Rating must be at least 0.',
                    'rating.max' => 'Rating cannot exceed 100.',
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

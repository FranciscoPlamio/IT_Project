<?php

namespace App\Helpers\FormRules;

class Form1_01Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'exam_type' => ['required', 'string'],
                'date_of_exam' => ['nullable', 'date', 'before_or_equal:today'],

                // Applicant Details - Using strict name validation (letters only, no numbers)
                'last_name' => self::nameRules(required: true, minLength: 2, maxLength: 50),
                'first_name' => self::nameRules(required: true, minLength: 2, maxLength: 50),
                'middle_name' => self::nameRules(required: false, minLength: 1, maxLength: 50),

                // Date of birth with age validation
                'dob' => self::dobRules(required: true, minAge: 18, maxAge: 70),

                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],
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

                'school_attended' => ['required', 'string'],
                'course_taken' => ['required', 'string'],
                'year_graduated' => ['required', 'string'],

                // Assistance
                'needs' => ['required', 'boolean'],
                'needs_details' => ['required_if:needs,1', 'string', 'nullable'],

                // Declaration
                'signature_name' => self::nameRules(required: false, minLength: 2, maxLength: 100),
                'date_accomplished' => ['nullable', 'date'],
                'or_no' => ['nullable', 'string'],
                'or_date' => ['nullable', 'date'],
                'or_amount' => self::numericRules(required: false, min: 0),
                'admit_name' => self::nameRules(required: false, minLength: 2, maxLength: 100),
                'mailing_address' => ['nullable', 'string'],
                'exam_for' => ['nullable', 'string'],
                'place_of_exam' => ['nullable', 'string'],
                'admission_date' => ['nullable', 'date'],
                'time_of_exam' => ['nullable', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'exam_type.required' => 'Please select an examination type',
                    'needs.required' => 'Please select Yes or No',
                    'needs_details.required_if' => 'Please specify your needs',
                    'date_of_exam.before_or_equal' => 'Invalid date. Please enter correct date of exam',
                    'signature_name.regex' => 'Signature name must contain only letters, spaces, hyphens, or apostrophes.',
                    'admit_name.regex' => 'Name must contain only letters, spaces, hyphens, or apostrophes.',
                ]
            ),

            'attributes' => [
                'dob' => 'date of birth',
            ]
        ];
    }
}

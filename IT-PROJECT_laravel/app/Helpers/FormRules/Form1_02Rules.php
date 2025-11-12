<?php

namespace App\Helpers\FormRules;

class Form1_02Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                // Applicant Details
                'last_name' => ['required', 'string', 'min:2'],
                'first_name' => ['required', 'string', 'min:2'],
                'middle_name' => ['required', 'string', 'min:2'],

                // 3 
                'dob' => [
                    'required',
                    'date',
                    'before_or_equal:' . now()->subYears(18)->toDateString(),
                    'after_or_equal:' . now()->subYears(70)->toDateString(),
                ],
                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],

                //8 Address fields
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => ['required', 'email', 'regex:/^[A-Za-z0-9](?:[A-Za-z0-9\.]{4,28}[A-Za-z0-9])?@(gmail|yahoo|outlook)\.com$/i',],

                // Exam fields
                'exam_place' => ['required', 'string'],
                'exam_date' => ['required', 'date', 'before_or_equal:today'],
                'rating' => ['required', 'numeric'],

                'height' => ['required', 'string'],
                'weight' => ['required', 'string'],
                'employment_status' => ['required', 'string'],
                'employment_type' => ['required', 'string'],
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'years' => ['nullable', 'integer'],
                'certificate_type' => ['required', 'string'],



            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 

            'attributes' => [
                'dob' => 'date of birth', // custom attribute name
            ]
        ];
    }
}

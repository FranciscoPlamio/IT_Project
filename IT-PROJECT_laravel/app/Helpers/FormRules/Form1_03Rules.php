<?php

namespace App\Helpers\FormRules;

class Form1_03Rules
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
                'dob' => ['required', 'date', 'before_or_equal:today'],
                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],

                //8
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => ['nullable', 'email'],

                'height' => ['required', 'numeric'],
                'weight' => ['required', 'numeric'],
                'employment_status' => ['required', 'string'],
                'employment_type' => ['required', 'string'],
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'years' => ['required', 'integer'],
                'certificate_type' => ['required', 'string'],
                'exam_place' => ['required', 'string'],
                'exam_date' => ['required', 'date', 'before_or_equal:today'],
                'rating' => ['required', 'numeric'],
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

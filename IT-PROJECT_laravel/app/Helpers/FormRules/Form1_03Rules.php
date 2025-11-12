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
                'dob' => [
                    'required',
                    'date',
                    'before_or_equal:' . now()->subYears(18)->toDateString(),
                    'after_or_equal:' . now()->subYears(70)->toDateString(),
                ],
                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],

                //8 Address fields
                'unit' => ['nullable', 'string'],
                'street' => ['nullable', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => [
                    'required',
                    'email',
                    'min:6',
                    'max:30',
                    'regex:/^[A-Za-z0-9](?:[A-Za-z0-9\.]{4,28}[A-Za-z0-9])@(gmail|yahoo|outlook)\.com$/i'
                ],
                // Application type fields
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'years' => ['nullable', 'integer'],

                // Exam fields
                'exam_place' => ['required', 'string'],
                'exam_date' => ['required', 'date', 'after_or_equal:today'],
                'rating' => ['required', 'numeric'],

                'atroc_arsl_no'  => ['required', 'integer'],
                'call_sign'  => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'station_class'  => ['required', 'string'],
                'permit_type'  => ['required', 'string'],
                'club_name'  => ['nullable', 'string'],
                'assigned_frequency'  => ['nullable', 'string'],
                'preferred_call_sign'  => ['nullable', 'string'],
            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 
            'attributes' => []

        ];
    }
}

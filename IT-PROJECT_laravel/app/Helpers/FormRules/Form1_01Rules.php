<?php

namespace App\Helpers\FormRules;

class Form1_01Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'exam_type' => ['required', 'string'],
                'date_of_exam' => ['nullable', 'date', 'before_or_equal:today'],

                // Applicant Details
                'last_name' => ['required', 'string', 'min:2', 'max:50'],
                'first_name' => ['required', 'string', 'min:2', 'max:50'],
                'middle_name' => ['nullable', 'string', 'min:1', 'max:50'],
                'dob' => [
                    'required',
                    'date',
                    'before_or_equal:' . now()->subYears(18)->toDateString(),
                    'after_or_equal:' . now()->subYears(70)->toDateString(),
                ],
                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],
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
                'school_attended' => ['required', 'string'],
                'course_taken' => ['required', 'string'],
                'year_graduated' => ['required', 'string'],

                // Assistance
                'needs' => ['required', 'boolean'],
                'needs_details' => ['required_if:needs,1', 'string', 'nullable'],

                // Declaration
                'signature_name' => ['nullable', 'string'],
                'date_accomplished' => ['nullable', 'date'],
                'or_no' => ['nullable', 'string'],
                'or_date' => ['nullable', 'date'],
                'or_amount' => ['nullable', 'numeric'],
                'admit_name' => ['nullable', 'string'],
                'mailing_address' => ['nullable', 'string'],
                'exam_for' => ['nullable', 'string'],
                'place_of_exam' => ['nullable', 'string'],
                'admission_date' => ['nullable', 'date'],
                'time_of_exam' => ['nullable', 'string'],
            ],

            'messages' => [
                'exam_type.required' => 'Please select an examination type',
                'email.regex' => 'Email address must meet the following conditions:
<ul class="list-disc pl-6 mt-1">
    <li>Use a Gmail, Yahoo, or Outlook address</li>
    <li>Minimum of 6 characters and maximum of 30 characters</li>
    <li>Only letters, numbers, and periods (.) are allowed</li>
    <li>Cannot start or end with a period (.)</li>
    <li>No consecutive periods (..)</li>
</ul>',
                'needs.required' => 'Please select Yes or No',
                'needs_details.required_if' => 'Please specify your needs',
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'date_of_exam.before_or_equal' => 'Invalid date. Please enter correct date of exam',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 

            'attributes' => [
                'dob' => 'date of birth', // custom attribute name
            ]
        ];
    }
}

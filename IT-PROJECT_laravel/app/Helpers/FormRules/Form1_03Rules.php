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
                'modification_reason' => ['required_if:application_type,modification', 'string'],
                'years' => ['required_unless:certificate_type,at-lifetime-new,at-lifetime-modification', 'integer'],

                // Exam fields
                'exam_place' => ['required', 'string'],
                'exam_date' => ['required', 'date', 'before_or_equal:today'],
                'rating' => ['required', 'numeric'],

                'atroc_arsl_no'  => ['required_if:application_type,modification,renewal', 'string'],
                'call_sign'  => ['required_if:application_type,modification,renewal', 'string'],
                'validity' => ['required_if:application_type,modification,renewal', 'date', 'after_or_equal:today'],
                'station_class'  => ['required_if:certificate_type,atrsl-new,atrsl-renew-mod,temporary-foreign', 'string'],
                'certificate_type'  => ['required', 'string'], //no need
                'club_name'  => ['nullable', 'string'],
                'assigned_frequency'  => ['nullable', 'string'],
                'preferred_call_sign'  => ['nullable', 'string'],

                //equipment
                'equipment_make_1'   => ['required', 'string'],
                'equipment_type_1'   => ['required', 'string'],
                'equipment_serial_1' => ['required', 'string'],
                'equipment_freq_1'   => ['required', 'string'], // or 'integer' if numeric
            ],

            'messages' => [
                'dob.before_or_equal' => 'Invalid date. Please enter correct date of birth.',
                'contact_number.regex' => 'Please enter a valid contact number with 10–11 digits.'
            ], // custom messages 
            'attributes' => []

        ];
    }
}

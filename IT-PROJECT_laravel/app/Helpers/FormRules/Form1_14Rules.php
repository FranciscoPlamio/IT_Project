<?php

namespace App\Helpers\FormRules;

class Form1_14Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'nature_service' => ['required', 'string'],
                'radio_service' => ['required', 'string'],
                
                // Station units - integers only
                'rt_units' => self::integerRules(required: false, min: 0),
                'fx_units' => self::integerRules(required: false, min: 0),
                'fb_units' => self::integerRules(required: false, min: 0),
                'ml_units' => self::integerRules(required: false, min: 0),
                'p_units' => self::integerRules(required: false, min: 0),
                'bc_units' => self::integerRules(required: false, min: 0),
                'fc_units' => self::integerRules(required: false, min: 0),
                'fa_units' => self::integerRules(required: false, min: 0),
                'ma_units' => self::integerRules(required: false, min: 0),
                'tc_units' => self::integerRules(required: false, min: 0),
                'others_station_specify' => ['nullable', 'string'],
                'others_station_units' => self::integerRules(required: false, min: 0),

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
                
                // Station / Equipment
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'latitude' => ['required', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'points_of_comm' => ['required', 'string'],
                'proposed_freq' => ['required', 'string'],
                'bw_emission' => ['required', 'string'],
                'data_rate' => ['required', 'string'],
                'others_station' => ['nullable', 'string'],
                'make_type_model' => ['required', 'string'],
                'serial_number' => ['required', 'string'],
                'power_output' => ['required', 'string'],
                'frequency_range' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'longitude.regex' => 'Longitude must be a valid coordinate (e.g., 121.0742).',
                    'latitude.regex' => 'Latitude must be a valid coordinate (e.g., 14.5995).',
                ]
            ),

            'attributes' => []
        ];
    }
}

<?php

namespace App\Helpers\FormRules;

class Form1_11Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'permit_type' => ['required', 'string'],
                'years' => self::integerRules(required: false, min: 1, max: 10),
                'radio_service' => ['required', 'string'],
                'others_specify' => ['nullable', 'string'],

                // Applicant details - Address fields
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

                // Applicant name - letters only
                'applicant' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'validity' => ['required', 'date', 'after_or_equal:today'],

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

                // Station Equipment
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'latitude' => ['required', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'points_of_comm' => ['required', 'string'],
                'assigned_freq' => ['required', 'string'],
                'bandwidth_emission' => ['required', 'string'],
                'configuration' => ['required', 'string'],
                'data_rate' => ['required', 'string'],
                'call_sign' => ['required', 'string'],
                'rsl_no' => self::numericRules(required: true),

                'make_type_model' => ['required', 'string'],
                'serial_number' => ['required', 'string'],

                'power_output' => ['required', 'string'],
                'frequency_range' => ['required', 'string'],
                'others_station' => ['nullable', 'string'],
                'antenna_type' => ['required', 'string'],
                'antenna_height' => ['required', 'string'],
                'antenna_gain' => ['required', 'string'],
                'antenna_directivity' => ['required', 'string'],
                'antenna_polarization' => ['required', 'string'],
                'antenna_beamwidth' => ['required', 'string'],
                'antenna_diameter' => ['required', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'longitude.regex' => 'Longitude must be a valid coordinate (e.g., 121.0742).',
                    'latitude.regex' => 'Latitude must be a valid coordinate (e.g., 14.5995).',
                    'rsl_no.numeric' => 'RSL number must be a number.',
                    'years.integer' => 'Years must be a whole number.',
                ]
            ),

            'attributes' => []
        ];
    }
}

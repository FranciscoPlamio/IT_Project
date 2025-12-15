<?php

namespace App\Helpers\FormRules;

class Form1_09Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Applicant details - name validation (letters only)
                'applicant' => self::nameRules(required: true, minLength: 2, maxLength: 100),
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'cpc_cpcn_pa_rsl_no' => ['required', 'string'],

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

                // Application Details
                'application_type' => ['required', 'string'],
                'permit_type' => ['required', 'string'],
                'radio_service' => ['required', 'string'],
                'others_specify' => ['nullable', 'string'],
                'nature_service' => ['required', 'string'],

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
                'frequency' => ['required', 'string'],
                'make_type_model' => ['required', 'string'],
                'serial_number' => ['required', 'string'],
                'bandwidth_emission' => ['required', 'string'],
                'power_output' => ['required', 'string'],
                'frequency_range' => ['required', 'string'],

                // Source of Equipment
                'dealer_name' => ['required', 'string'],
                'authorized_seller_buyer' => ['required', 'string'],
                'or_invoice_no' => ['required', 'string'],
                'permit_rsl_no' => ['required', 'string'],

                // Intended Use
                'intended_use' => ['required', 'string'],
                'others_use_specify' => ['nullable', 'string'],
                'storage_location' => ['required_if:intended_use,storage', 'nullable', 'string'],
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

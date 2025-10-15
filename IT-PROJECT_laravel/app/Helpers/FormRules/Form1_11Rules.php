<?php

namespace App\Helpers\FormRules;

class Form1_11Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                //Application Details
                'application_type' => ['required', 'string'],
                'modification_reason' => ['nullable', 'string'],
                'permit_type' => ['required', 'string'],
                'years' => ['required', 'integer'],
                'radio_service' => ['required', 'string'],
                'others_specify' => ['nullable', 'string'],

                // Applicant details
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'email' => ['nullable', 'email'],

                'applicant' => ['required', 'string'],
                'validity' => ['required', 'date', 'after_or_equal:today'],

                //Application Details
                'application_type' => ['required', 'string'],
                'radio_service' => ['required', 'string'],
                'rt_units' => ['nullable', 'integer'],
                'fx_units' => ['nullable', 'integer'],
                'fb_units' => ['nullable', 'integer'],
                'ml_units' => ['nullable', 'integer'],
                'p_units' => ['nullable', 'integer'],
                'bc_units' => ['nullable', 'integer'],
                'fc_units' => ['nullable', 'integer'],
                'fa_units' => ['nullable', 'integer'],
                'ma_units' => ['nullable', 'integer'],
                'tc_units' => ['nullable', 'integer'],
                'others_station_specify' => ['nullable', 'string'],
                'others_station_units' => ['nullable', 'integer'],

                //Station Equipment
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'latitude' => ['required', 'string'],
                'points_of_comm' => ['required', 'string'],
                'assigned_freq' => ['required', 'string'],
                'bandwidth_emission' => ['required', 'string'],
                'configuration' => ['required', 'string'],
                'data_rate' => ['required', 'string'],
                'call_sign' => ['required', 'string'],
                'rsl_no' => ['required', 'numeric'],

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

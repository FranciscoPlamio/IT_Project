<?php

namespace App\Helpers\FormRules;

class Form1_14Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                //Application Details
                'nature_service' => ['required', 'string'],
                'radio_service' => ['required', 'string'],
                'rt_units' => ['nullable', 'string'],
                'fx_units' => ['nullable', 'string'],
                'fb_units' => ['nullable', 'string'],
                'ml_units' => ['nullable', 'string'],
                'p_units' => ['nullable', 'string'],
                'bc_units' => ['nullable', 'string'],
                'fc_units' => ['nullable', 'string'],
                'fa_units' => ['nullable', 'string'],
                'ma_units' => ['nullable', 'string'],
                'tc_units' => ['nullable', 'string'],
                'others_station_specify' => ['nullable', 'string'],
                'others_station_units' => ['nullable', 'string'],

                // Applicant Details
                'applicant' => ['required', 'string'],
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
                // Station / Equipment
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'latitude' => ['required', 'string'],
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

            'messages' => [],

            'attributes' => []
        ];
    }
}

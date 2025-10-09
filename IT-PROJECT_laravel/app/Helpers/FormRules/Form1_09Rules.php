<?php

namespace App\Helpers\FormRules;

class Form1_03Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
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
                'validity' => ['required', 'date', 'before_or_equal:today'],
                'cpc_cpcn_pa_rsl_no' => ['required', 'integer'],

                //Application Details
                'application_type' => ['required', 'string'],
                'radio_service' => ['required', 'string'],
                'others_specify' => ['required', 'string'],
                'nature_service' => ['required', 'string'],
                'rt_units' => ['required', 'integer'],
                'fx_units' => ['required', 'integer'],
                'fb_units' => ['required', 'integer'],
                'ml_units' => ['required', 'integer'],
                'p_units' => ['required', 'integer'],
                'bc_units' => ['required', 'integer'],
                'fc_units' => ['required', 'integer'],
                'fa_units' => ['required', 'integer'],
                'ma_units' => ['required', 'integer'],
                'tc_units' => ['required', 'integer'],
                'others_station_specify' => ['required', 'string'],
                'others_station_units' => ['required', 'integer'],

                //Station Equipment
                'exact_location' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'latitude' => ['required', 'string'],
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

                // Inteded Use
                'intended_use' => ['required', 'string'],
                'others_use_specify' => ['required', 'string'],
                'storage_location' => ['required', 'string'],
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

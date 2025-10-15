<?php

namespace App\Helpers\FormRules;

class Form1_09Rules
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
                'validity' => ['required', 'date', 'after_or_equal:today'],
                'cpc_cpcn_pa_rsl_no' => ['required', 'integer'],

                //Application Details
                'application_type' => ['required', 'string'],
                'radio_service' => ['required', 'string'],
                'others_specify' => ['nullable', 'string'],
                'nature_service' => ['required', 'string'],
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
                'frequency' => ['required', 'numeric'],
                'make_type_model' => ['required', 'string'],
                'serial_number' => ['required', 'string'],
                'bandwidth_emission' => ['required', 'string'],
                'power_output' => ['required', 'string'],
                'frequency_range' => ['required', 'numeric'],

                // Source of Equipment
                'dealer_name' => ['required', 'string'],
                'authorized_seller_buyer' => ['required', 'string'],
                'or_invoice_no' => ['required', 'string'],
                'permit_rsl_no' => ['required', 'string'],

                // Inteded Use
                'intended_use' => ['required', 'string'],
                'others_use_specify' => ['nullable', 'string'],
                'storage_location' => ['nullable', 'string'],
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

<?php

namespace App\Helpers\FormRules;

class Form1_13Rules
{
    use BaseValidationRules;

    public static function rules(): array
    {
        return [
            'rules' => [
                // Applicant - name validation (letters only)
                'applicant' => self::nameRules(required: true, minLength: 2, maxLength: 100),

                // Particulars - Authorized
                'authorized_exact_location' => ['nullable', 'string'],
                'proposed_exact_location' => ['nullable', 'string'],
                'authorized_longitude' => ['nullable', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'proposed_longitude' => ['nullable', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'authorized_latitude' => ['nullable', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'proposed_latitude' => ['nullable', 'string', 'regex:/^-?\d+(\.\d+)?$/'],
                'authorized_points_of_comm' => ['nullable', 'string'],
                'proposed_points_of_comm' => ['nullable', 'string'],
                'authorized_assigned_freq' => ['nullable', 'string'],
                'proposed_assigned_freq' => ['nullable', 'string'],
                'authorized_bw_emission' => ['nullable', 'string'],
                'proposed_bw_emission' => ['nullable', 'string'],
                'authorized_configuration' => ['nullable', 'string'],
                'proposed_configuration' => ['nullable', 'string'],
                'authorized_data_rate' => ['nullable', 'string'],
                'proposed_data_rate' => ['nullable', 'string'],
                'authorized_make_type_model' => ['nullable', 'string'],
                'proposed_make_type_model' => ['nullable', 'string'],
                'authorized_serial_no' => ['nullable', 'string'],
                'proposed_serial_no' => ['nullable', 'string'],
                'authorized_power_output' => ['nullable', 'string'],
                'proposed_power_output' => ['nullable', 'string'],
                'authorized_freq_range' => ['nullable', 'string'],
                'proposed_freq_range' => ['nullable', 'string'],
                'authorized_others_1' => ['nullable', 'string'],
                'proposed_others_1' => ['nullable', 'string'],
                'authorized_others_2' => ['nullable', 'string'],
                'proposed_others_2' => ['nullable', 'string'],
                'authorized_others_3' => ['nullable', 'string'],
                'proposed_others_3' => ['nullable', 'string'],
            ],

            'messages' => array_merge(
                self::allCommonMessages(),
                [
                    'applicant.regex' => 'Applicant name must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
                    'authorized_longitude.regex' => 'Longitude must be a valid coordinate.',
                    'proposed_longitude.regex' => 'Longitude must be a valid coordinate.',
                    'authorized_latitude.regex' => 'Latitude must be a valid coordinate.',
                    'proposed_latitude.regex' => 'Latitude must be a valid coordinate.',
                ]
            ),

            'attributes' => []
        ];
    }
}

<?php

namespace App\Helpers\FormRules;

class Form1_26Rules
{
    public static function rules(): array
    {
        return [
            'rules' => [
                // Affiant Details
                'affiant_name' => ['required', 'string'],
                'civil_status' => ['required', 'string'],
                'residence_address' => ['required', 'string'],

                // Text Messages
                'message1_datetime' => ['required', 'string'],
                'message1_phone' => ['required', 'regex:/^[0-9]{10,11}$/'],
                'message1_content' => ['required', 'string'],

                // Complaint Against
                'complaint_against' => ['required', 'string'],
            ],

            'messages' => [],

            'attributes' => []
        ];
    }
}

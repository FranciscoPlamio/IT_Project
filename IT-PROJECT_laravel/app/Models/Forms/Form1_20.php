<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_20 extends BaseForm
{
    protected $table = 'form1_20';

    protected $extraFields = [
        // Application Details
        'application_type',
        'modification_reason',
        'service_category',

        // Applicant Details
        'applicant',
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',
        'cpcn_pa_ca_no',
        'cpcn_validity',
        'cor_no',
        'cor_validity',
        'known_by_another_name',
        'former_name',

        // Value Added Service
        'vas_services',
        'others_vas',
    ];

    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_22 extends BaseForm
{
    protected $table = 'form1_22';

    protected $extraFields = [
        // Application Details
        'application_type',
        'modification_reason',
        'license_type',
        'applicant_classification',
        'service_type',
        'others_service',
        'no_of_years',

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
        'validity',
        'pa_ca_no',
        'service_area',
        'exact_location',
        'longitude',
        'latitude',
    ];

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with this form’s extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

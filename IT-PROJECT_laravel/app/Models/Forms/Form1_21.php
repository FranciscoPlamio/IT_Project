<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_21 extends BaseForm
{
    protected $table = 'form1_21';

    protected $extraFields = [
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

        // Permit License Details
        'permit_license_certificate_no',
        'validity',

        // Circumstances
        'circumstances',
    ];

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with this form’s extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

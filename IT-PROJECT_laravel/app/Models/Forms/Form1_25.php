<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_25 extends BaseForm
{
    protected $table = 'form1_25';

    protected $extraFields = [
        // Complainant Details
        'complainant_name',
        'postal_address',
        'email_address',
        'contact_number',

        // Service Provider
        'business_name',
        'business_address',
        'provider_contact_number',

        // Nature of Complaint
        'complaint_type',
        'complaint_type_others',
        'incident_date',
        'incident_time',

        // Complaint Details
        'complaint_details',

        // Supporting Documents
        'supporting_documents',
    ];

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with this form’s extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

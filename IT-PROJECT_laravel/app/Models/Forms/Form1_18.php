<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_18 extends BaseForm
{
    // Table name
    protected $table = 'form1_18';

    // Fields from Form1_18Rules
    protected $extraFields = [
        // Application Details
        'application_type',
        'modification_reason',
        'application_category',

        // Applicant Details
        'applicant',
        'permit_no',
        'validity',
        'entity_type',
        'others_entity',

        // Address fields
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',

        // Personnel Required
        'supervising_engineer_name',
        'supervising_engineer_pece',
        'supervising_engineer_validity',
        'technician_name',
        'technician_certificate',
        'technician_validity',
    ];

    // Data type casts (none required for now)
    protected $casts = [];

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Merge BaseForm fillable fields with extra ones
    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

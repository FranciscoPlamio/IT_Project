<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_19 extends BaseForm
{
    // Table name
    protected $table = 'form1_19';

    // Extra fields specific to Form1_19
    protected $extraFields = [
        // Type of Equipment
        'equipment_type',

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
        'permit_import_no',
        'invoice_no',
        'cpcn_pa_rsl_no',

        // Equipment and Devices
        'equipment1_make',
        'equipment1_quantity',
        'equipment1_serial',
    ];

    // Data type casts
    protected $casts = [
        'equipment1_quantity' => 'integer',
    ];

    // Relationship: each form belongs to a user
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

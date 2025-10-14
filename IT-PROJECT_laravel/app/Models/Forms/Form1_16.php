<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_16 extends BaseForm
{
    // Table name
    protected $table = 'form1_16';

    // Fields from Form1_16Rules
    protected $extraFields = [
        // Transport Details
        'place_of_origin',
        'purpose',
        'destination',

        // Application Information
        'applicant',
        'validity',
        'permit_rsl_no',
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',

        // Proposed Equipment
        'equipment1_make',
        'equipment1_serial',
        'equipment2_make',
        'equipment2_serial',
        'equipment3_make',
        'equipment3_serial',
    ];

    // Data type casts (none needed here)
    protected $casts = [];

    // Relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Merge BaseForm fillable fields with the extra ones
    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

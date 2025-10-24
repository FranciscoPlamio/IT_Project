<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_26 extends BaseForm
{
    protected $table = 'form1_26';

    protected $extraFields = [
        // Affiant Details
        'affiant_name',
        'civil_status',
        'residence_address',

        // Text Messages
        'message1_datetime',
        'message1_phone',
        'message1_content',

        // Complaint Against
        'complaint_against',
    ];

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with this form’s extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

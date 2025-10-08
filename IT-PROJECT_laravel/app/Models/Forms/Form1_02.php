<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_02 extends BaseForm
{
    // Table name
    protected $table = 'form1_02';

    // Database fields
    protected $extraFields = [
        // 3 fields
        'dob',
        'sex',
        'nationality',

        // 8 fields
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',

        'height',
        'weight',
        'employment_status',
        'employment_type',
        'application_type',
        'modification_reason',
        'years',
        'certificate_type',

        // exam fields
        'exam_place',
        'exam_date',
        'rating',
    ];

    // Fields data type
    protected $casts = [
        'dob' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

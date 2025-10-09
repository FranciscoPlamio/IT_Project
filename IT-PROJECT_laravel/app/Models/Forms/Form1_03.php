<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_03 extends BaseForm
{
    // Table name
    protected $table = 'form1_03';

    protected $extraFields = [
        // Applicant name fields
        'last_name',
        'first_name',
        'middle_name',

        // Personal info
        'dob',
        'sex',
        'nationality',

        // Address fields
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',

        // Application type fields
        'application_type',
        'modification_reason',
        'years',

        // Exam fields
        'exam_place',
        'exam_date',
        'rating',

        // License info
        'atroc_arsl_no',
        'call_sign',
        'validity',
        'station_class',
        'permit_type',
        'club_name',
        'assigned_frequency',
        'temporary_foreign',
        'preferred_call_sign',
    ];

    // Casts for date fields
    protected $casts = [
        'dob' => 'date',
        'exam_date' => 'date',
        'validity' => 'date',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Merge BaseForm fillable + extra fields
    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

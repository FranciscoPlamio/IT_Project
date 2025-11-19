<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_01 extends BaseForm
{
    // Table name
    protected $table = 'form1_01';

    // Database fields
    protected $extraFields = [
        'last_name',
        'first_name',
        'middle_name',

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
        'school_attended',
        'course_taken',
        'year_graduated',
        'exam_type',
        'signature_name',
        'date_accomplished',
        'or_amount',
        'mailing_address',
        'admission_date',
        'needs',
        'needs_details',
        'admission_slip',
        'or',
    ];

    // Fields data type
    protected $casts = [
        'dob' => 'date',
        'date_of_exam' => 'date',
        'date_accomplished' => 'date',
        'or_date' => 'date',
        'or_amount' => 'float',
        'admission_date' => 'date',
        'needs' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

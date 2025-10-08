<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_01 extends BaseForm
{
    // Table name
    protected $table = 'form1_01';

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

        'school_attended',
        'course_taken',
        'year_graduated',
        'exam_type',
        'date_of_exam',
        'signature_name',
        'date_accomplished',
        'or_no',
        'or_date',
        'or_amount',
        'admit_name',
        'mailing_address',
        'exam_for',
        'place_of_exam',
        'admission_date',
        'time_of_exam',
        'needs',
        'needs_details',
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

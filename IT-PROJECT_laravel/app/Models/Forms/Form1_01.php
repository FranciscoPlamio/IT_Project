<?php

namespace App\Models\Forms;

use App\Models\User;
use MongoDB\Laravel\Eloquent\Model;

class Form1_01 extends Model
{
    // Connection
    protected $connection = 'mongodb';

    // Table name
    protected $table = 'form1_01';

    // Database fields
    protected $fillable = [
        'form_token',
        'last_name',
        'first_name',
        'middle_name',
        'dob',
        'sex',
        'nationality',
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
        'rtg',
        'amateur',
        'rphn',
        'rroc',
        'date_of_exam',
        'status',
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
        'user_id',
    ];

    // Fields data type
    protected $casts = [
        'dob' => 'date',
        'rtg' => 'array',
        'amateur' => 'array',
        'rphn' => 'array',
        'rroc' => 'array',
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

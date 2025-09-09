<?php

namespace App\Models\Forms\Form1_01;

use Illuminate\Database\Eloquent\Model;

class ApplicantDetails extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'form101_applicant_details';

    /**
     * The attributes that are mass assignable.
     */
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
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'dob' => 'date',
    ];
}



<?php

namespace App\Models\Forms\Form1_01;

use MongoDB\Laravel\Eloquent\Model;

class Declaration extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'form101_declaration';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_token',
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
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'date_accomplished' => 'date',
        'or_date' => 'date',
        'or_amount' => 'float',
        'admission_date' => 'date',
    ];
}

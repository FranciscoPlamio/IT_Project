<?php

namespace App\Models\Forms\Form1_01;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Form101ApplicationDetails extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'form101_application_details';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_token',
        'rtg',
        'amateur',
        'rphn',
        'rroc',
        'date_of_exam',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'rtg' => 'array',
        'amateur' => 'array',
        'rphn' => 'array',
        'rroc' => 'array',
        'date_of_exam' => 'date',
    ];

    /**
     * Applicant Details section (linked by shared form_token).
     */
    public function applicantDetails(): HasOne
    {
        return $this->hasOne(ApplicantDetails::class, 'form_token', 'form_token');
    }

    /**
     * Request for Assistance section (linked by shared form_token).
     */
    public function requestAssistance(): HasOne
    {
        return $this->hasOne(RequestAssistance::class, 'form_token', 'form_token');
    }

    /**
     * Declaration section (linked by shared form_token).
     */
    public function declaration(): HasOne
    {
        return $this->hasOne(Declaration::class, 'form_token', 'form_token');
    }
}

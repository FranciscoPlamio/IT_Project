<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_02 extends BaseForm
{
    // Table name
    protected $table = 'form1_02';

    // Database fields
    protected $extraFields = [];

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

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

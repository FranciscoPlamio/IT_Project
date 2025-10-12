<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_13 extends BaseForm
{
    // Table name
    protected $table = 'form1_13';

    // Fields from Form1_13Rules
    protected $extraFields = [
        // Applicant
        'applicant',

        // Particulars 
        'authorized_exact_location',
        'proposed_exact_location',
        'authorized_longitude',
        'proposed_longitude',
        'authorized_latitude',
        'proposed_latitude',
        'authorized_points_of_comm',
        'proposed_points_of_comm',
        'authorized_assigned_freq',
        'proposed_assigned_freq',
        'authorized_bw_emission',
        'proposed_bw_emission',
        'authorized_configuration',
        'proposed_configuration',
        'authorized_data_rate',
        'proposed_data_rate',
        'authorized_make_type_model',
        'proposed_make_type_model',
        'authorized_serial_no',
        'proposed_serial_no',
        'authorized_power_output',
        'proposed_power_output',
        'authorized_freq_range',
        'proposed_freq_range',
        'authorized_others_1',
        'proposed_others_1',
        'authorized_others_2',
        'proposed_others_2',
        'authorized_others_3',
        'proposed_others_3',
    ];


    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Merge BaseForm fillable with extraFields
    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

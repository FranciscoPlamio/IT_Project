<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_11 extends BaseForm
{
    // Table name
    protected $table = 'form1_11';

    // Fields based on your Form1_11Rules attributes
    protected $extraFields = [
        // Application Details
        'application_type',
        'modification_reason',
        'permit_type',
        'years',
        'radio_service',
        'others_specify',

        // Applicant details
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',

        'applicant',
        'validity',

        // Station Units
        'rt_units',
        'fx_units',
        'fb_units',
        'ml_units',
        'p_units',
        'bc_units',
        'fc_units',
        'fa_units',
        'ma_units',
        'tc_units',
        'others_station_specify',
        'others_station_units',

        // Station Equipment
        'exact_location',
        'longitude',
        'latitude',
        'points_of_comm',
        'assigned_freq',
        'bandwidth_emission',
        'configuration',
        'data_rate',
        'call_sign',
        'rsl_no',

        'make_type_model',
        'serial_number',

        'power_output',
        'frequency_range',
        'others_station',
        'antenna_type',
        'antenna_height',
        'antenna_gain',
        'antenna_directivity',
        'antenna_polarization',
        'antenna_beamwidth',
        'antenna_diameter',
    ];

    // Data type casting
    protected $casts = [
        'validity' => 'date',
        'rsl_no' => 'integer',
        'years' => 'integer',

    ];

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

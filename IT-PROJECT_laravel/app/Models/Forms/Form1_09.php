<?php

namespace App\Models\Forms;

use App\Models\User;

class Form1_09 extends BaseForm
{
    // Table name
    protected $table = 'form1_09';

    // Extra fields unique to this form
    protected $extraFields = [
        // Address fields
        'unit',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code',
        'contact_number',
        'email',

        // Applicant details
        'applicant',
        'validity',
        'cpc_cpcn_pa_rsl_no',

        // Application details
        'application_type',
        'radio_service',
        'others_specify',
        'nature_service',
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
        'frequency',
        'make_type_model',
        'serial_number',
        'bandwidth_emission',
        'power_output',
        'frequency_range',

        // Source of Equipment
        'dealer_name',
        'authorized_seller_buyer',
        'or_invoice_no',
        'permit_rsl_no',

        // Intended Use
        'intended_use',
        'others_use_specify',
        'storage_location',
    ];

    protected $casts = [
        'validity' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function __construct(array $attributes = [])
    {
        // Merge BaseForm fillable with these extra fields
        $this->fillable = array_merge($this->fillable ?? [], $this->extraFields);
        parent::__construct($attributes);
    }
}

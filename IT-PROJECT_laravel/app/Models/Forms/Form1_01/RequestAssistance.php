<?php

namespace App\Models\Forms\Form1_01;

use Illuminate\Database\Eloquent\Model;

class RequestAssistance extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'form101_request_assistance';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_token',
        'needs',
        'needs_details',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'needs' => 'boolean',
    ];
}



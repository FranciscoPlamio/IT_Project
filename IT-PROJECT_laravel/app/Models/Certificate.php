<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Certificate extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'certificates';

    protected $fillable = [
        'certificate_no',
        'form_token',
        'form_type',
        'certificate_type',
        'holder_name',
        'date_issued',
        'valid_until',
        'status',
    ];
}

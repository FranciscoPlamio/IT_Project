<?php

namespace App\Models\Forms;

use MongoDB\Laravel\Eloquent\Model;

abstract class BaseForm extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'form_token',
        'user_id',
        'last_name',
        'first_name',
        'middle_name'
    ];
}

<?php

namespace App\Models\Forms;

use MongoDB\Laravel\Eloquent\Model;

abstract class BaseForm extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'form_token',
        'user_id',
        'attachments'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (property_exists($this, 'extraFields')) {
            $this->fillable = array_merge($this->fillable, $this->extraFields);
        }
    }
}

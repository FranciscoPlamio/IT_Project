<?php

namespace App\Models\Forms;

use MongoDB\Laravel\Eloquent\Model;

class FormsTransactions extends Model
{
    //
    protected $connection = 'mongodb';

    // Table name
    protected $table = 'forms_transactions';

    protected $fillable = [
        'form_id',
        'form_token',
        'form_type', 
        'user_id',
        'status',   
        'payment_status',   
        'payment_method',   
        'payment_reference',  
        'payment_amount',
        'payment_date',
        'remarks'   
    ];

    // Fields data type
    protected $casts = [
        'payment_date' => 'date',
    ];
}

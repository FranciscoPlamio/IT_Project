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
        'form_type', // Form number ex. "form1-01", "form1-02"
        'user_id',
        'status',   // Status of form ex. "pending", "approved", "denied" 
        'payment_status',   // Status of payment ex. "paid", "unpaid"
        'payment_method',   // "Cash", "GCash"
        'payment_reference',  // Reference number if GCash
        'payment_amount',
        'payment_date',
        'remarks'   // Message of admin if like denied.
    ];

    // Fields data type
    protected $casts = [
        'payment_date' => 'date',
    ];
}

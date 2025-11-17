<?php

namespace App\Models\Forms;

use App\Helpers\FormManager;
use App\Models\User;
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

    //Gets the user with user_id from user collection
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    //Gets the form data with form_id from form collection
    public function form()
    {
        return $this->belongsTo(FormManager::getFormModel($this->form_type), 'form_id', '_id');
    }
}

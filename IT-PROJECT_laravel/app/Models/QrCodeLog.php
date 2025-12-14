<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Use MongoDB Eloquent
use App\Models\User;

class QrCodeLog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'qr_code_logs';

    protected $fillable = [
        'action',    // uploaded, replaced, deleted
        'admin_id',
    ];

    public $timestamps = true;

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}

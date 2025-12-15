<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $connection = 'mongodb';
        $collection = 'payment_qr_activity_logs';

        $schema = Schema::connection($connection);

        if (!$schema->hasCollection($collection)) {
            $schema->create($collection, function ($collection) {
                // MongoDB is schema-less, so we don't define columns here
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $connection = 'mongodb';
        Schema::connection($connection)->dropIfExists('payment_qr_activity_logs');
    }
};

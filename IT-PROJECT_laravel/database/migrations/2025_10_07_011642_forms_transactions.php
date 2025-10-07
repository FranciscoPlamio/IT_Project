<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::connection('mongodb')->create('forms_transactions', function (Blueprint $collection) {
            $collection->unique('form_token');
            $collection->index('user_id');
            $collection->index('form_type');

            $collection->index('status');
            $collection->index('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('forms_meta');
    }
};

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
        Schema::connection('mongodb')->create('form1_01', function (Blueprint $collection) {
            $collection->unique('form_token'); // unique index for updateOrCreate
            $collection->index('user_id');  // add index for user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->table('form1_01', function ($collection) {
            $collection->dropIndex(['form_token']);
        });
    }
};

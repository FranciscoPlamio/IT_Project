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
        Schema::connection('mongodb')->create('certificates', function (Blueprint $collection) {

            // PRIMARY VERIFICATION IDENTIFIER
            $collection->unique('certificate_no');

            // Reference to application
            $collection->index('form_token');

            // For filtering / reporting
            $collection->index('form_type');
            $collection->index('certificate_type');

            // Status-based verification
            $collection->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('certificates');
    }
};

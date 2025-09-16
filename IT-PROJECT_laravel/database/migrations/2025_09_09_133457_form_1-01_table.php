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
        // Form 1-01: Application Details
        Schema::connection('mongodb')->create('form101_application_details', function (Blueprint $collection) {
            $collection->unique('form_token'); // unique index for updateOrCreate
        });

        // Form 1-01: Applicant Details
        Schema::connection('mongodb')->create('form101_applicant_details', function (Blueprint $collection) {
            $collection->unique('form_token'); // unique index for updateOrCreate
        });

        // Form 1-01: Request for Assistance
        Schema::connection('mongodb')->create('form101_request_assistance', function (Blueprint $collection) {
            $collection->unique('form_token');
        });

        // Form 1-01: Declaration
        Schema::connection('mongodb')->create('form101_declaration', function (Blueprint $collection) {
            $collection->unique('form_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->table('form101_declaration', function ($collection) {
            $collection->dropIndex(['form_token']);
        });
        Schema::connection('mongodb')->table('form101_request_assistance', function ($collection) {
            $collection->dropIndex(['form_token']);
        });
        Schema::connection('mongodb')->table('form101_applicant_details', function ($collection) {
            $collection->dropIndex(['form_token']);
        });
        Schema::connection('mongodb')->table('form101_application_details', function ($collection) {
            $collection->dropIndex(['form_token']);
        });
    }
};

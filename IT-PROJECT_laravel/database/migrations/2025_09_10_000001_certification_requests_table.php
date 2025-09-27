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
        Schema::create('application_requests', function (Blueprint $table) {
            $table->id();
            // Who submitted the application (admin-side accounts or users table)
            $table->unsignedBigInteger('user_id')->nullable()->index();

            // Identifies which form (e.g., 1-01, 1-02, etc.)
            $table->string('form_code'); // e.g., "1-01"

            // Shared token linking sections of a single application instance
            $table->string('form_token')->index();

            // For Form 1-01 example, we link to applicant row
            $table->unsignedBigInteger('form101_applicant_id')->nullable();
            $table->unsignedBigInteger('form101_application_details_id')->nullable();

            // Status lifecycle
            $table->string('status')->default('submitted'); // submitted, in_review, verified, rejected, completed
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('verified_at')->nullable();

            // Optional transaction identifier (e.g., payment or internal tracking)
            $table->string('transaction_id')->nullable()->unique();

            $table->timestamps();

            // Foreign keys (kept flexible; adjust based on your DB engine)
            $table->foreign('form101_applicant_id')
                ->references('id')
                ->on('form101_applicant_details')
                ->onDelete('set null');

            $table->foreign('form101_application_details_id')
                ->references('id')
                ->on('form101_application_details')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_requests');
    }
};



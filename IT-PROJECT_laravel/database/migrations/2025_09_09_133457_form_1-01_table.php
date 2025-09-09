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
        Schema::create('form101_application_details', function (Blueprint $table) {
            $table->id();
            $table->string('form_token')->index(); // shared token to link sections
            $table->json('rtg')->nullable(); // Radiotelegraphy selections
            $table->json('amateur')->nullable(); // Amateur selections
            $table->json('rphn')->nullable(); // Radiotelephony selections
            $table->json('rroc')->nullable(); // Restricted Radiotelephone selections
            $table->date('date_of_exam')->nullable();
            $table->timestamps();
        });

        // Form 1-01: Applicant Details
        Schema::create('form101_applicant_details', function (Blueprint $table) {
            $table->id();
            $table->string('form_token')->index();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('nationality')->nullable();
            $table->string('unit')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('school_attended')->nullable();
            $table->string('course_taken')->nullable();
            $table->string('year_graduated')->nullable();
            $table->timestamps();
        });

        // Form 1-01: Request for Assistance
        Schema::create('form101_request_assistance', function (Blueprint $table) {
            $table->id();
            $table->string('form_token')->index();
            $table->boolean('needs')->nullable();
            $table->text('needs_details')->nullable();
            $table->timestamps();
        });

        // Form 1-01: Declaration
        Schema::create('form101_declaration', function (Blueprint $table) {
            $table->id();
            $table->string('form_token')->index();
            $table->string('signature_name')->nullable();
            $table->date('date_accomplished')->nullable();
            // OR details
            $table->string('or_no')->nullable();
            $table->date('or_date')->nullable();
            $table->decimal('or_amount', 10, 2)->nullable();
            // Admission slip fields
            $table->string('admit_name')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('exam_for')->nullable();
            $table->string('place_of_exam')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('time_of_exam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form101_declaration');
        Schema::dropIfExists('form101_request_assistance');
        Schema::dropIfExists('form101_applicant_details');
        Schema::dropIfExists('form101_application_details');
    }
};

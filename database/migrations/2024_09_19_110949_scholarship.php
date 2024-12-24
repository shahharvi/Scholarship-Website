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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('sname');
            $table->text('description');
            // $table->text('eligibility');
            $table->string('caste');
            $table->string('amount');
            $table->decimal('percentage', 5, 2);  // Percentage (max 100.00)
            $table->string('s_provider');
            $table->string('provider_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('state')->nullable();
            $table->string('family_income')->nullable();
            $table->string('course_level'); // Required course level (e.g., Undergraduate, Postgraduate)
            $table->string('course_name')->nullable(); // Specific course names, if applicable
            // $table->integer('max_age')->nullable(); // Maximum age to be eligible
            // $table->year('passing_year')->nullable(); // Applicable passing year criteria
            $table->timestamps();  // Created at & updated at fields
            $table->string('Scholarship_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
        $table->id();  // Primary Key
        $table->unsignedBigInteger('user_id'); // Foreign key for user
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('email');
        $table->string('phone_number');
        $table->date('dob');
        $table->integer('age');
        $table->enum('gender', ['male', 'female', 'other']);
        $table->string('caste');
        $table->string('district');
        $table->string('state');
        $table->string('family_income');
        $table->string('course_level');
        $table->string('course_name');
        $table->string('total_marks');
        $table->string('obtain_marks');
        $table->string('percentage');
        $table->year('passing_year');
        $table->timestamps();
        $table->string('profile_pic')->nullable();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

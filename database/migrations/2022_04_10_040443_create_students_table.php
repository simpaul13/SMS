<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->unique();
            $table->string('student_firstname');
            $table->string('student_lastname');
            $table->string('student_middlename')->nullable();
            $table->string('student_username')->unique();
            $table->string('student_email')->unique();
            $table->string('student_password');
            $table->string('student_phone');
            $table->string('student_address');
            $table->string('student_city');
            $table->string('student_state');
            $table->string('student_zip');
            $table->string('student_country');
            $table->enum('student_status', ['active', 'inactive'])->default('active');
            $table->enum('student_gender', ['Male', 'Female']);
            $table->date('student_birthday');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

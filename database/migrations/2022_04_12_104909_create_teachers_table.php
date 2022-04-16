<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_number')->unique();
            $table->string('teacher_firstname');
            $table->string('teacher_lastname');
            $table->string('teacher_middlename')->nullable();
            $table->string('teacher_username')->unique();
            $table->string('teacher_email')->unique();
            $table->string('teacher_password');
            $table->string('teacher_phone')->unique();
            $table->string('teacher_address');
            $table->string('teacher_city');
            $table->string('teacher_state');
            $table->string('teacher_zip');
            $table->string('teacher_country');
            $table->enum('teacher_status', ['active', 'inactive'])->default('inactive');
            $table->enum('teacher_gender', ['Male', 'Female']);
            $table->date('teacher_birthday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->integer('hostel_id');
            $table->string('name');
            $table->integer('phone');
            $table->string('email');
            $table->string('father_name');
            $table->integer('father_phone');
            $table->string('father_email');
            $table->string('coaching');
            $table->integer('room_no');
            $table->string('bed_type');
            $table->string('payment_cycle');
            $table->string('payment');
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
        Schema::dropIfExists('student');
    }
}

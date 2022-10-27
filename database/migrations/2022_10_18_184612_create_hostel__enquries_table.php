<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelEnquriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel__enquries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fathersName');
            $table->string('gender');
            $table->string('mobileNumber');
            $table->string('email');
            $table->string('class');
            $table->string('area');
            $table->string('bedOption');
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
        Schema::dropIfExists('hostel__enquries');
    }
}

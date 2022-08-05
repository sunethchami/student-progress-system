<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_no')->unsigned();
            $table->string('name');
            $table->integer('combined_maths')->unsigned();
            $table->integer('physics')->unsigned();
            $table->integer('chemistry')->unsigned();
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
        Schema::dropIfExists('students_details');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyUserTable extends Migration
{
    public function up()
    {
        Schema::create('specialty_user', function (Blueprint $table) {
            $table->bigIncrements('id'); // Columna id autoincremental

            // Doctor
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Specialty
            $table->unsignedBigInteger('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('specialty_user');
    }
}

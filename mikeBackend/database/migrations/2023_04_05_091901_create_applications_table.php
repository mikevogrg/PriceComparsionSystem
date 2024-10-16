<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->String('fullname');
            $table->String('email');
            $table->String('phone');
            $table->String('dob');
            $table->String('sex');
            $table->String('address');
            $table->String('status');
            $table->String('job');
            $table->String('salary');
            $table->String('marital');
            $table->String('cv');
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
        Schema::dropIfExists('applications');
    }
}

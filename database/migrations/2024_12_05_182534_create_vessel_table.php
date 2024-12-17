<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVesselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessel', function (Blueprint $table) {
            $table->increments('vessel_id');
            $table->string('vessel_name',150)->unique();
            $table->string('vessel_call_sign',20);
            $table->string('vessel_mmsi',20);
            $table->string('vessel_imo',20);
            $table->string('vessel_year_build',10);
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
        Schema::drop('vessel');
    }
}

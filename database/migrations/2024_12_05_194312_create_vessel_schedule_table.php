<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVesselScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessel_schedule', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->string('vessel_id',150);
            $table->string('arrival_date',20);
            $table->string('departure_date',20);
            $table->string('pol',30);
            $table->string('pod',30);
			
			
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
        //
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacationWorkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_workings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->float('hours')->unsigned();
            $table->time('from');
            $table->unsignedInteger('vac_id');

            $table->foreign('vac_id')->references('id')->on('vacations');

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
        Schema::dropIfExists('vacation_workings');
    }
}

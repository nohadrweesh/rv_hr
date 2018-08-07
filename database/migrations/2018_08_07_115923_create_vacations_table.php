<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->string('title');
            $table->string('reason');
            $table->enum('status',['pending','managerConfirmed','hrConfirmed','confirmed','rejected','canceled'])->default('pending');
            $table->boolean('availabilty');
            //$table->foreign('emp_id')->references('id')->on('employees');

            $table->integer('emp_id')->default(1);
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
        Schema::dropIfExists('vacations');
    }
}

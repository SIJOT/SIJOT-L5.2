<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreakfastMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakfast_months', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->string('month');
            $table->integer('month_nr');
            $table->string('deathline');
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
        Schema::drop('breakfast_months');
    }
}

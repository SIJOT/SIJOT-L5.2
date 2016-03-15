<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VerhuurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental', function(Blueprint $t) {
            $t->increments('id');
            $t->string('Start_date');
            $t->string('End_date');
            $t->string('Group');
            $t->string('Email');
            $t->string('telephone');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rental');
    }
}

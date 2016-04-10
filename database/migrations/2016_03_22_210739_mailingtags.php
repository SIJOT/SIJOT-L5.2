<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Mailingtags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('mailing_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('mailing_tags_mailing_users', function (Blueprint $table) {
            $table->integer('mailing_tags_id')->unsigned()->index();
            $table->foreign('mailing_tags_id')->references('id')->on('mailing_tags')->onDelete('cascade');

            $table->integer('mailing_users_id')->unsigned()->index();
            $table->foreign('mailing_users_id')->references('id')->on('mailing_users')->onDelete('cascade');

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
        DB::query('SET FOREIGN_KEY_CHECKS = 0'); // Disable foreign key check.

        Schema::drop('mailing_tags_mailing_users');
        Schema::drop('mailing_tags');
        Schema::drop('mailing_users');

        DB::query('SET FOREIGN_KEY_CHECKS = 1'); // Enable foreign key check.
    }
}

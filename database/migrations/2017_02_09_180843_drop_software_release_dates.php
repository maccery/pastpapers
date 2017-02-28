<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSoftwareReleaseDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suggested_release_date_votes', function (Blueprint $table) {
            $table->drop();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('suggested_release_date_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('suggested_release_date_id')->unsigned();
            $table->foreign('suggested_release_date_id')->references('id')->on('suggested_release_dates');
            $table->timestamps();
        });
    }
}

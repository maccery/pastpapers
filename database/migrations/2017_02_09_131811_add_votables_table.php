<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->renameColumn('review_id', 'votable_id');
            $table->integer('votable_owner_id')->unsigned();
            $table->foreign('votable_owner_id')->references('id')->on('users');
            $table->dropForeign('votes_review_id_foreign');
            $table->string('votable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_votable_owner_id_foreign');
            $table->dropColumn('votable_owner_id');
            $table->renameColumn('votable_id', 'review_id');
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->dropColumn('votable_type');
        });
    }
}

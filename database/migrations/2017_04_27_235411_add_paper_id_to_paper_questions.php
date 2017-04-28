<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaperIdToPaperQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paper_questions', function (Blueprint $table) {
            $table->integer('past_paper_id')->unsigned();
            $table->foreign('past_paper_id')->references('id')->on('past_papers');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paper_questions', function (Blueprint $table) {
            $table->dropForeign('past_paper_id')->references('id')->on('past_papers');
            $table->dropColumn('past_paper_id');
            $table->dropSoftDeletes();
        });
    }
}

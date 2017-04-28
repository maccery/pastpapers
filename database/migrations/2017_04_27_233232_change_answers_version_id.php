<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAnswersVersionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('reviews_version_id_foreign');
            $table->dropColumn('version_id');

            $table->integer('paper_question_id')->unsigned();
            $table->foreign('paper_question_id')->references('id')->on('paper_questions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->integer('version_id')->unsigned();
            $table->foreign('version_id')->references('id')->on('versions');
            $table->dropForeign('answers_paper_question_id_foreign');
            $table->dropColumn('paper_questions_id');
        });
    }
}

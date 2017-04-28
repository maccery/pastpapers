<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PastPaperSoftwareIdRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('past_papers', function (Blueprint $table) {
            $table->renameColumn('software_id', 'subject_id');
            $table->renameColumn('version', 'past_paper');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('past_papers', function (Blueprint $table) {
            $table->renameColumn('subject_id', 'software_id');
            $table->renameColumn('past_paper', 'version');
        });
    }
}

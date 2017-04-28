<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTablesFORPASTPAPERS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('softwares', 'subjects');
        Schema::rename('versions', 'past_papers');
        Schema::rename('reviews', 'answers');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('subjects', 'softwares');
        Schema::rename('past_papers', 'versions');
        Schema::rename('answers', 'reviews');
    }
}

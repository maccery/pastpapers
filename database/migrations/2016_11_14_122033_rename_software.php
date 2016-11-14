<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSoftware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('software', 'softwares');
        Schema::rename('review', 'reviews');
        Schema::rename('version', 'versions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('softwares', 'software');
        Schema::rename('reviews', 'review');
        Schema::rename('versions', 'version');
    }
}

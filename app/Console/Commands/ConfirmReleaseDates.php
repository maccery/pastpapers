<?php

namespace App\Console\Commands;

use App\SuggestedReleaseDate;
use DB;
use Illuminate\Console\Command;

class ConfirmReleaseDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'confirm:release_dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Confirms any crowd-sourced release dates if enough votes are in';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $suggested_release_dates = SuggestedReleaseDate::whereIn('id', function ($query) {
            $query->select(DB::raw('suggested_release_date_id
FROM (
SELECT SUM(vote) as sum, suggested_release_date_id FROM suggested_release_date_votes GROUP BY suggested_release_date_id) A
WHERE A.sum > 10
'));
        })->get();

        foreach ($suggested_release_dates as $suggested_release_date)
        {
            $version = $suggested_release_date->version;
            $version->release_date = $suggested_release_date->release_date;
            $version->confirmed_release_date = True;
            $version->save();
        }
    }
}

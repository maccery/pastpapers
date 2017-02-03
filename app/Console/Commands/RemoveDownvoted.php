<?php

namespace App\Console\Commands;

use App\Review;
use DB;
use Illuminate\Console\Command;

class RemoveDownvoted extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:downvoted';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes any reviews that have a certain number of downvotes';

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
        $reviews = Review::whereIn('id', function ($query) {
            $query->select(DB::raw('review_id
FROM (
SELECT SUM(vote) as sum, review_id FROM votes GROUP BY review_id) A
WHERE A.sum < 0
'));
        })->delete();
    }
}

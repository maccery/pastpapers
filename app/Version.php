<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Version extends Model
{

    protected $fillable = [
        'id', 'version', 'release_date', 'confirmed_real', 'confirmed_release_date', 'software_id'
    ];

    public function software()
    {
        return $this->belongsTo('App\Software');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function versionVotes()
    {
        return $this->hasMany('App\VersionVote');
    }

    public function suggestedDates()
    {
        return $this->hasMany('App\SuggestedReleaseDate');
    }

    public function canLeaveReview()
    {
        return $this->confirmed_real and $this->isReleased();
    }

    public function isReleased()
    {
        $date_time = new Carbon();
        return $this->confirmed_release_date and $date_time->now() >= $this->release_date;
    }

    public function votedFor()
    {
        return $this->hasOne('App\VersionVote')->authored();
    }


    public function topTags() {
        return Tag::whereIn('id', function ($query) {
            $query->selectRaw('tag_id FROM  (
            SELECT
 COUNT(tag_id) total, tag_id
FROM tags TT, taggables T, reviews R, versions V 
WHERE V.id = R.version_id 
AND T.tag_id = TT.id
AND T.taggable_id = R.id 
AND T.taggable_type = \'App\\\Review\' 
AND V.id = ?
GROUP BY tag_id
ORDER BY total DESC
LIMIT 3) B', [$this->id]);
        })->get();
    }
}

<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class Version extends Votable
{

    protected $fillable = [
        'id',
        'version',
        'release_date',
        'confirmed_real',
        'confirmed_release_date',
        'software_id',
        'user_id',
    ];

    public function software()
    {
        return $this->belongsTo('App\Software');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
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
LIMIT 10) B', [$this->id]);
        })->get();
    }

    public function getVerdictAttribute() {
        $positive = $this->positive;
        if ($positive > 60) {
            return 'Mainly positive';
        }
        elseif ($positive < 40) {
            return 'Mainly negative';
        }
        else {
            return 'No concensus';
        }
    }

    public function getPositiveAttribute() {
        return $this->tagCount('positive') / $this->tagCount('negative') + $this->tagCount('positive');
    }

    public function getNegativeAttribute() {
        return $this->tagCount('negative') / $this->tagCount('positive') + $this->tagCount('negative');
    }


    public function getRouteAttribute(){
        return route('browse_by_version', ['software' => $this->software, 'version' => $this]);
    }

    public function getFullNameAttribute() {
        return $this->version;
    }

    private function tagCount($tag_type) {
        return Tag::whereIn('id', function ($query) use ($tag_type) {
            $query->selectRaw('tag_id FROM  (
            SELECT
 COUNT(tag_id) total, tag_id
FROM tags TT, taggables T, reviews R, versions V 
WHERE V.id = R.version_id 
AND T.tag_id = TT.id
AND T.taggable_id = R.id 
AND T.taggable_type = \'App\\\Review\' 
AND V.id = ?
AND TT.type = ?
GROUP BY tag_id
ORDER BY total DESC) B', [$this->id, $tag_type]);
        })->count();
    }
}

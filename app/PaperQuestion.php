<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperQuestion extends Votable
{
    protected $fillable = [
        'question',
        'user_id',
        'confirmed_real',
        'past_paper_id',
    ];


    public function canLeaveAnswer()
    {
        return $this->confirmed_real;
    }


    public function topTags() {
        return Tag::whereIn('id', function ($query) {
            $query->selectRaw('tag_id FROM  (
            SELECT
 COUNT(tag_id) total, tag_id
FROM tags TT, taggables T, answers R, paper_questions V 
WHERE V.id = R.paper_question_id 
AND T.tag_id = TT.id
AND T.taggable_id = R.id 
AND T.taggable_type = \'App\\\Answer\' 
AND V.id = ?
AND R.deleted_at IS NULL
GROUP BY tag_id
ORDER BY total DESC
LIMIT 10) B', [$this->id]);
        })->get();
    }

    public function getVerdictAttribute() {

        $total = $this->positive + $this->negative;

        if ($total == 0)
        {
            return 'No concensus';
        }
        $positive = 100 * $this->positive / (float) $total;

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

    public function getPercentagePositiveAttribute()
    {
        return 100 * $this->positive / (float)max($this->positive + $this->negative, 1);
    }

    public function getPositiveAttribute() {
        return $this->tagCount('positive');
    }

    public function getNegativeAttribute() {
        return $this->tagCount('negative');
    }


    private function tagCount($tag_type) {
        return Tag::whereIn('id', function ($query) use ($tag_type) {
            $query->selectRaw('tag_id FROM  (
            SELECT
 COUNT(tag_id) total, tag_id
FROM tags TT, taggables T, answers R, paper_questions V 
WHERE V.id = R.paper_question_id 
AND T.tag_id = TT.id
AND T.taggable_id = R.id 
AND T.taggable_type = \'App\\\Answer\' 
AND V.id = ?
AND TT.type = ?
AND R.deleted_at IS NULL
GROUP BY tag_id
ORDER BY total DESC) B', [$this->id, $tag_type]);
        })->count();
    }

    public function getRouteAttribute(){
        return route('help');
    }

    public function getFullNameAttribute()
    {
        return $this->question;
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
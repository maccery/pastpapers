<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'name',
        'type',
    ];

    /**
     * Get all of the owning taggable models.
     */
    public function taggable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the answers that are assigned this tag.
     */
    public function answers()
    {
        return $this->morphedByMany('App\Answer', 'taggable');
    }

    public function badgeColor()
    {
        if ($this->type == 'positive') {
            return 'success';
        } elseif ($this->type == 'negative') {
            return 'danger';
        } else {
            return 'default';
        }
    }
}

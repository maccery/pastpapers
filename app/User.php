<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Config;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'voting_power', 'points'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns all the answers for all past_papers
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * Returns all the votes on answers by this author
     */
    public function votes()
    {
        return $this->hasMany('App\Vote', 'votable_owner_id');
    }

    public function emailDomain() {
        $email_parts = explode('@', $this->email);

        if (count($email_parts) <= 1) return null;

        return $email_parts[1];
    }

    public function getVotingPower()
    {
        $voting_power_buckets = Config::get('crowd_sourced.voting_power');
        $points = $this->points;
        $max_points = 0;
        foreach ($voting_power_buckets as $key => $value)
        {
            if ($points >= $key) {
                $max_points = $value;
            }
        }
        return $max_points;
    }

    public function updateVotingPower() {
        $this->points = $this->votes->sum('vote');
        $new_voting_power = $this->getVotingPower();
        $this->voting_power = $new_voting_power;
        $this->save();
    }

    public function getLevelAttribute() {
        $voting_power_buckets = Config::get('crowd_sourced.voting_power');
        $points = $this->points;
        $level = -1;
        $max_level = 0;
        foreach ($voting_power_buckets as $key => $value)
        {
            if ($points >= $key) {
                $level++;
            }
            $max_level++;
        }
        return array($level, $max_level);
    }

    public function isTopUser() {
        $top_email_domains = array(
            'techcrunch.com',
            'ed.ac.uk',
            'wired.com',
        );

        if (in_array($this->emailDomain(), $top_email_domains))
        {
            return $this->emailDomain();
        }

        return False;
    }

    public function getRouteAttribute(){
        return route('view_user', ['user' => $this]);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Returns all the reviews for all versions
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * Returns all the votes on reviews by this author
     */
    public function votes()
    {
        return $this->hasManyThrough('App\Vote', 'App\Review');
    }

    public function emailDomain() {
        $email_parts = explode('@', $this->email);

        return $email_parts[1];
    }

    public function isTopUser() {
        $top_email_domains = array(
            'techcrunch.com',
            'ed.ac.uk',
            'wired.com',
            'me.com',
        );

        return in_array($this->emailDomain(), $top_email_domains);
    }
}

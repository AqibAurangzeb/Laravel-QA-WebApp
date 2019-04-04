<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'avatar','password', 'provider', 'provider_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions() {
        return $this->hasMany('App\Question');
    }

    public function answers() {
        return $this->hasMany('App\Answers');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public static function search($query) {
        return User::where('name', 'LIKE', '%'.$query.'%');
    }
}

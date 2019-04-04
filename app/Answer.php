<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_id', 'answer', 'question_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function question() {
        return $this->belongsTo('App\Question');
    }

    public function votes() {
        return $this->hasMany('App\Vote');
    }
}

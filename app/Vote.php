<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'user_id', 'answer_id', 'question_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function question() {
        return $this->belongsTo('App\Question');
    }

    public function answer() {
        return $this->belongsTo('App\Answers');
    }

}

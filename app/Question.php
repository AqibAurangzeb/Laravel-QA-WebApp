<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id', 'question', 'description'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public static function search($query) {
        return Question::where('question', 'LIKE','%'.$query.'%')->get();
    }
}

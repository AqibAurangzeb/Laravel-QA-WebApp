<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // Create the relationship to users
    public function user() {
        return $this->belongsTo('App\User');
    }

    // Create the relationship to answers
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    /**
     * Search
     * @return object
     */
    public static function search($query) {
        return Question::where('question', 'LIKE','%'.$query.'%')->get();
    }
}

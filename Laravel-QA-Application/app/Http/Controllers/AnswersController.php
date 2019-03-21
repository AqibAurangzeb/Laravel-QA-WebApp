<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Answer;

class AnswersController extends Controller
{
    public function store() {
        $answer = new Answer();

        $answer->user_id = Auth::user()->id;
        $answer->question_id = request('question_id');
        $answer->answer = request('answer');

        $answer->save();
        return Redirect::to('questions/'.Request::get('question_id'));
    }
}

<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Answer;

class AnswersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store() {
        $attributes = request()->validate([
            'answer' => ['required', 'max:255'],
            'question_id' => ['required']
        ]);

        $attributes['user_id'] = auth()->id();

        Answer::create($attributes);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Vote;

class VotesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store() {

        $attributes = request()->validate([
            'answer_id' => ['required'],
            'question_id' => ['required']
        ]);

        $attributes['user_id'] = auth()->id();

        Vote::updateOrCreate($attributes);

        return redirect()->back();

    }
}

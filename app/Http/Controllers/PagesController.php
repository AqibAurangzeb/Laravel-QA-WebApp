<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Question;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return redirect('/questions');
    }

    public function loggedIn()
    {
        return view('/loggedIn');
    }

    public function search() {
        $query =  Input::get('query');
        $questions = Question::search($query);
        return view('search')->with('questions', $questions)->with('page_title','Search')->with('query',$query);
    }

}

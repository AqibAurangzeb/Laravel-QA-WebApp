<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Question;
use App\User;

class QuestionsController extends Controller
{

    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions','users'));
    }

    public function create()
    {
        return view('questions.ask');
    }

    public function store(Request $request)
    {
        $question = new Question();

        $question->user_id = Auth::user()->id;

        $question->question = request('question');

        $question->save();

        return redirect('/questions');
    }

    public function show($id)
    {
        $question = Question::findorfail($id);

        return view('questions.show', compact('question'));
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);

        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        if($question->user_id != Auth::user()->id) {
            return redirect('/questions');
        }
        $question->question = request('question');

        $question->save();

        return redirect('/questions');
    }

    public function destroy($id)
    {
        $question = Question::find($id);

        if($question->user_id != Auth::user()->id) {
            return redirect('/questions');
        }

        $question->delete();

        return redirect('/questions');
    }
}

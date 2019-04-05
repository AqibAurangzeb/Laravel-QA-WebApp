<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Question;
use App\User;

class QuestionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions','users'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'question' => ['required', 'min:5', 'max:255'],
            'description' => ['nullable', 'min:5', 'max:255']
        ]);

        $attributes['user_id'] = auth()->id();

        Question::create($attributes);

        return redirect('/questions');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        return view('questions.edit', compact('question'));
    }

    public function update(Question $question)
    {
        $this->authorize('update', $question);

        $attributes = request()->validate([
            'question' => ['required', 'min:5', 'max:255'],
            'description' => ['nullable', 'min:5', 'max:255']
        ]);

        $question->update($attributes);

        return redirect('/questions');
    }

    public function destroy(Question $question)
    {
        $this->authorize('update', $question);

        $question->delete();

        return redirect('/questions');
    }

    public function markBestAnswer($id)
    {
        $question = Question::findorFail($id);

        $this->authorize('update', $question);

        $question->best_answer_id = request('bestAnswer');

        $question->solved = true;

        $question->save();

        return redirect()->back();
    }
}

@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Question</h5>
            <h6 class="card-subtitle mb-2 text-muted">created by {{ $question->user->name }}</h6>
            <p class="card-text">{{ $question->question }}</p>
            <a href="/questions/{{ $question->id }}/edit" class="card-link">Edit</a>

            <hr>
            <h5 class="card-title">Answer</h5>
            <form method="POST" action="/answer">
                <div class="input-group mb-3">
                    {{ csrf_field() }}

                    <input type="text" name="answer" class="form-control" aria-label="Question" aria-describedby="button-addon2">
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Submit</button>
                    </div>
                </div>
            </form>

            <ul class="list-group list-group-flush">
                @foreach($question->answers as $answer)
                    <li class="list-group-item">{{ $answer->user->name }}: {{ $answer->answer }}</li>
                @endforeach

                {{--@foreach($answers as $answer)--}}
                {{--<li class="list-group-item">{{ $question->answers->first()->answer }}</li>--}}
                {{--@endforeach--}}
            </ul>


        </div>
    </div>
@endsection

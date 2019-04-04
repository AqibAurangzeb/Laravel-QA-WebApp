@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $question->question }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">created by {{ $question->user->name }}</h6>
            <p class="card-text">{{ $question->description }}</p>
            @can('update', $question)
                <a href="/questions/{{ $question->id }}/edit" class="card-link">Edit</a>
            @endcan

            <hr>
            <h5 class="card-title">Answer</h5>
            <form method="POST" action="/answer">
                <div class="input-group mb-3">
                    {{ csrf_field() }}

                    <input type="text" name="answer" class="form-control">
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Submit</button>
                    </div>
                </div>
            </form>

            <ul class="list-group list-group-flush">
                @foreach($question->answers as $answer)

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                            @if(strpos($answer->user->avatar , 'http') === 0)
                                <img src="{{ $answer->user->avatar }}" style="width: 42px;height: 42px;border-radius: 50%; padding-right: 3px">
                            @else
                                <img src="/images/avatars/{{ $answer->user->avatar }}" style="width: 42px;height: 42px;border-radius: 50%; padding-right: 3px">
                            @endif
                            {{ $answer->user->name }}: {{ $answer->answer }}
                            </span>
                            <span class="badge badge-primary badge-pill">
                                <form class="form-inline"  method="POST" action="/vote">
                                    {{ csrf_field() }}
                                     <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                                     <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    <span>{{ count($answer->votes) . '  '}}<button type="{{ auth()->id() != null ? 'submit' : 'button' }}"><i class="far fa-thumbs-up"></i></button></span>
                                </form>
                            </span>


                        </li>
                @endforeach
            </ul>


        </div>
    </div>
@endsection

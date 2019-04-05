@extends('layouts.master')

@section('content')
    <h1>Questions Index</h1>
    <hr>
    <h2>Unsolved</h2>
    <div class="row">
        @foreach($questions as $question)
            @if(!$question->solved)
                <div class="col-sm-4" style="margin-bottom: 15px">
                    <div class="card">
                        @include('containers.question_card')
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <h2>Solved</h2>
    <div class="row">
        @foreach($questions as $question)
            @if($question->solved)
                <div class="col-sm-4" style="margin-bottom: 15px">
                    <div class="card">
                        @include('containers.question_card')
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
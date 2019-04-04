@extends('layouts.master')

@section('content')
    <h1>Questions Index</h1>
    <hr>
    <div class="card-columns">

        @foreach($questions as $question)
            @include('containers.question_card')
        @endforeach
    </div>
@endsection
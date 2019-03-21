@extends('layouts.master')

@section('content')

    <div class="card-columns">
        @foreach($questions as $question)
            @include('containers.question_card')
        @endforeach
    </div>
@endsection
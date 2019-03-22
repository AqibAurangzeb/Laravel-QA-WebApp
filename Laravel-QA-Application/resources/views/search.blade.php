@extends('layouts.master')

@section('content')
    <h1>Search Results for "{{$query}}"</h1>
    <div class="card-columns">
        @foreach( $questions as $question )
            @include('containers.question_card')
        @endforeach
    </div>
@endsection
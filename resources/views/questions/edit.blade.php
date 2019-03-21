@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ask Question</div>

                    <div class="card-body">
                        <form method="POST" action="/questions/{{ $question->id }}">
                            <div class="input-group mb-3">
                                {{ csrf_field() }}

                                <input type="text" name="question" value="{{ $question->question }}" class="form-control" aria-label="Question" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"type="submit" id="button-addon2" name="_method" value="PATCH">Update</button>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit" id="button-addon2" name="_method" value="DELETE">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ask Question</div>

                    <div class="card-body">
                            <form method="POST" action="/questions">
                                <div class="input-group mb-3">
                                    {{ csrf_field() }}

                                    <input type="text" name="question" class="form-control" aria-label="Question" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

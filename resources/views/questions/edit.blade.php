@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ask Question</div>

                    <div class="card-body">
                        <form method="POST" action="/questions/{{ $question->id }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" name="question" id="question" class="form-control {{ $errors->has('question') ? 'is-invalid' : ''}}" value="{{ $question->question }}">
                                    <div class="invalid-feedback">
                                        @if($errors->has('question'))
                                            {{ $errors->first('question') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" rows="3">{{ $question->description }}</textarea>
                                    <div class="invalid-feedback">
                                        @if($errors->has('description'))
                                            {{ $errors->first('description') }}
                                        @endif
                                    </div>
                                </div>
                            <button class="btn btn-primary"type="submit" id="button-addon2" name="_method" value="PATCH">Update</button>
                            <button class="btn btn-danger" type="submit" id="button-addon2" name="_method" value="DELETE">Delete</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

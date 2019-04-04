@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ask Question</div>

                    <div class="card-body">
                        <form method="POST" action="/questions">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" name="question" id="question" class="form-control {{ $errors->has('question') ? 'is-invalid' : ''}}" value="{{ old('question') }}">
                                <div class="invalid-feedback">
                                    @if($errors->has('question'))
                                        {{ $errors->first('question') }}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" rows="3">{{ old('description') }}</textarea>
                                <div class="invalid-feedback">
                                    @if($errors->has('description'))
                                        {{ $errors->first('description') }}
                                    @endif
                                </div>
                            </div>

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

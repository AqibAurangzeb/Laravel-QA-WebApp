@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>

                    <div class="card-body">
                        @if(strpos(Auth::user()->avatar, 'http') === 0)
                            <img src="{{ $user->avatar }}" style="width: 150px;height: 150px; float: left; border-radius: 50%; margin-right: 25px">
                        @else
                            <img src="/images/avatars/{{ $user->avatar }}" style="width: 150px;height: 150px; float: left; border-radius: 50%; margin-right: 25px">
                        @endif
                        <h2> {{ $user->name }}'s Profile</h2>
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
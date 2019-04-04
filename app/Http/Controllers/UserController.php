<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Image;
use User;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function profile() {
        $user = auth()->user();

        $avatarLink = !Str::startsWith($user->avatar, 'http://www.gravatar.com/avatar/') ? '/images/avatars/'.$user->avatar : $user->avatar;

        return view('profile', compact('user', 'avatarLink'));
    }

    public function update_avatar(Request $request) {
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('images/avatars/' . $filename));

            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', compact('user'));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class UserInfoController extends Controller
{
    public function destroy()
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {

             return redirect('/')->with('success', 'Your account has been deleted!');
        }

    }
}

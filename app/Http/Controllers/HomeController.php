<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Room;
use \App\User;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // VERBETEREN, DIT IS ERG LELIJK
        $owner_id = Auth::id();
        $rooms = Room::where('owner_id', '=', $owner_id)->get();
        $owner = DB::table('users')->find($owner_id);
        return view('auth.home', compact('rooms', 'owner'));
    }
}

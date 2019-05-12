<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Room, App\User;

class PagesController extends Controller
{
    /**
     * Homepagina van de hele site.
     */
    public function index(){

        // Pak een paar kamers als hightlight
        $rooms = Room::all()->sortByDesc('created_at')->take(3);

        foreach ($rooms as $room) {
                $room['owner'] = $room->owner->name;
            };

        return view('pages.index', compact('rooms'));
    }

    public function about(){
        return view('pages.about');
    }
}

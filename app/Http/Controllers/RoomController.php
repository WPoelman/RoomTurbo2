<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
use DB;

class RoomController extends Controller
{

    /**
    * Only allow logged in user to create, edit, delete, store, update.
    * Guest are allowed to see all the rooms and the single room pages.
    */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();

        //dd($rooms);
        foreach ($rooms as $room) {
            $room['owner'] = DB::table('users')->where('id', $room['owner_id'])->value('name');
        };

        return view("rooms.rooms", compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("rooms.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $validated = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'size'          => 'required|integer',
            'price'         => 'required|integer',
            'type'          => 'required',
            'zip_code'      => 'required|max:7',
            'number'        => 'required|max:10'
        ]);

        // store data
        Room::create($validated + ['owner_id' => auth()->id()]);

        return redirect('/rooms')->with('success', 'Kamer is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $room['owner'] = DB::table('users')->where('id', $room['owner_id'])->value('name');
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // todo check hoe custom Room instance error meegegeven kan worden
    public function edit(Room $room)
    {
        if (!$room){
            return redirect('/rooms')->with('error', 'Kamer niet gevonden of niet geautoriseerd! Log in of zoek op het goede kamer nummer.');
        }
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update(request([
            'title',
            'owner',
            'description',
            'size',
            'price',
            'type',
            'zip_code',
            'number'
        ]));

        return redirect("/rooms")->with('success', 'Kamer is aangepast.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return redirect("/rooms")->with('success', 'Kamer is verwijderd!');
    }
}

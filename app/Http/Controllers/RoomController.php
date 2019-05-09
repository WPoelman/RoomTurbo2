<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = \App\Room::all();

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
            'owner'         => 'required',
            'description'   => 'required',
            'size'          => 'required',
            'price'         => 'required',
            'type'          => 'required',
            'zip_code'      => 'required',
            'number'        => 'required'
        ]);

        // store data
        \App\Room::create($validated);

        return redirect('/rooms')->with('success', 'Kamer is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_room =  \App\Room::find($id);
        return view('rooms.show', compact('single_room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$room_info = \App\Room::find($id)){
            return redirect('/rooms')->with('error', 'Kamer niet gevonden of niet geautoriseerd! Log in of zoek op het goede kamer nummer.');
        }
        return view('rooms.edit', compact('room_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = \App\Room::find($id);

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
        \App\Room::findOrFail($id)->delete();
        return redirect("/rooms")->with('success', 'Kamer is verwijderd!');
    }
}

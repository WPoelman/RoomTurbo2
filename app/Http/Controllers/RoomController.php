<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRoom;
use App\Room, App\User, DB, Auth, \App\RoomPicture, Storage;

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
        $rooms = Room::all()->sortByDesc('created_at');

        foreach ($rooms as $room) {
            $room['owner'] = $room->owner->name;
            $room['filename'] = DB::table('room_pictures')->where('room_id', $room['id'])->take(1)->value('filename');
        };

        // hier nog iets van pagination toevoegen
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
    public function store(UploadRoom $request)
    {

        // Get the validated data
        $room_data = $request->validated();

        // Store form data with id of user that created the room and
        // get the id of the room that was just created
        $room_id = Room::create($room_data + ['owner_id' => Auth::id()])->id;

        // Store pictures
        foreach ($room_data['pictures'] as $picture) {
            $filename = Storage::disk('rooms_pictures')->put('', $picture);
            // $filename = $picture->store('public');
            RoomPicture::create([
                'room_id'   => $room_id,
                'filename'  => $filename
            ]);
        }

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

        $room['owner'] = $room->owner->name;
        $room['filename'] = DB::table('room_pictures')->where('room_id', $room['id'])->value('filename');

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {

        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadRoom $request, Room $room)
    {

        $room->update($request->validated());

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

        // First find the room and the pictures from that room
        $room = Room::findOrFail($id);
        $picture_filenames = DB::table('room_pictures')->where('room_id', $id)->pluck('filename');

        // Then delete both the db entries and the picture files
        $room->delete();
        Storage::delete($picture_filenames->all());

        return redirect("/rooms")->with('success', 'Kamer is verwijderd!');
    }
}

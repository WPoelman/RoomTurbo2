<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class UserInfoController extends Controller
{
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

         $validated = $request->validate([
             'title'         => 'required|max:255',
             'description'   => 'required',
             'size'          => 'required|integer|max:5000',
             'price'         => 'required|integer|max:20000',
             'type'          => 'required|max:255',
             'zip_code'      => 'required|max:7',
             'number'        => 'required|max:10'
         ]);

         $room->update($validated);

         return redirect("/rooms")->with('success', 'Kamer is aangepast.');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy()
     {
        User::findOrFail(Auth::user()->id);
        Auth::logout();
        return redirect("/rooms")->with('success', 'Account is verwijderd.');
    }
}

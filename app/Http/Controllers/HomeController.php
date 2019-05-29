<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use Illuminate\Validation\Rule;
use \App\Room;
use \App\User;
use Auth, DB;

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
        $owner_id = Auth::id();
        $rooms = Room::where('owner_id', '=', $owner_id)->get();
        $owner = User::findOrFail($owner_id);

        return view('auth.home', compact('rooms', 'owner'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function edit()
     {
         if (! $user_id = Auth::id() ){
             return redirect('/')->with('error', 'Niet ingelogd!');
         }

         $user = User::find($user_id)->only('name', 'email');

         return view('auth.edit', compact('user'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateUser $request)
     {

         User::find(Auth::id())->update($request->validated());

         return redirect("/home")->with('success', 'Account is aangepast.');
     }

    /**
     * Remove the logged in user from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        User::findOrFail(Auth::user()->id)->delete();
        Auth::logout();

        return redirect("/rooms")->with('success', 'Account is verwijderd.');
    }

    /**
     * Log out the user and redirect to the reset password page.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        Auth::logout();

        return redirect("/password/reset");
    }
}

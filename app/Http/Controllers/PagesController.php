<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class PagesController extends Controller
{
    public function index(){

        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }
}

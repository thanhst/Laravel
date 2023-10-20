<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index()
    {
        $artistCount = Artwork::count();
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Home');
        return view('home',compact('artistCount'));
    }
}

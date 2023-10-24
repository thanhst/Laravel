<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $allMajors=Major::count();
        return view("home",compact('allMajors'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $flowerCount=Flower::count();
        return view("home",compact('flowerCount'));    
    }
}

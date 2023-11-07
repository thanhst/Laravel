<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class HomeController extends Controller
{
    //
    public function index()
    {
        $bookCount=Book::count();
        return view("home",compact("bookCount"));
    }
}

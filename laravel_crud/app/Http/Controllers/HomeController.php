<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    //
    public function index()
    {
        $bookCount = Book::count();
        $authorCount=Author::count();
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Trang chủ');
        return view("Home.index", compact("bookCount","authorCount"));
    }
}

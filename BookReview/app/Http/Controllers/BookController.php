<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Show all book');
        $elements = Book::orderBy('BookID', 'desc')->paginate(5);
        return view("Book.index", compact("elements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Create new book');
        return view('Book.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), [
            "Title" => "required",
            "Author" => "required",
            "Genre" => "required",
            "PublicationYear" => "required",
            "ISBN" => "required",
            "cover_image" => "required|image",
        ], [
            'Title.required' => 'Please add Title of Book',
            'Author.required' => 'Please add Author of Book',
            'Genre.required' => 'Please add genre of Book',
            'PublicationYear.required' => 'Please add Publication year of Book',
            'cover_image.required' => 'Please add image of Book',
            'cover_image.image' => 'Please add image of Book! You have selected a file that is not an image',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('warning', $validate->errors()->first());
        }
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = $coverImage->getClientOriginalName();
            $path = $coverImage->storeAs('img', $coverImageName, 'public');
            $coverImagePath = asset('storage/' . $path);
            $request->merge(['CoverImageURL' => $coverImagePath]);
        }
        if (Book::create($request->all())) {
            return redirect()->route('books.index')->with('success', "Create successsfully");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Show book');
        return view('Book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Edit book');
        return view('Book.update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $validate = Validator::make($request->all(), [
            "Title" => "required",
            "Author" => "required",
            "Genre" => "required",
            "PublicationYear" => "required|int|min:1900|max:2023",
            "ISBN" => "required",
            "cover_image" => "image",
        ], [
            'Title.required' => 'Please add Title of Book',
            'Author.required' => 'Please add Author of Book',
            'Genre.required' => 'Please add genre of Book',
            'PublicationYear.required' => 'Please add Publication year of Book',
            'cover_image.image' => 'Please add image of Book! You have selected a file that is not an image',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('warning', $validate->errors()->first());
        }
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = $coverImage->getClientOriginalName();
            $path = $coverImage->storeAs('img', $coverImageName, 'public');
            $coverImagePath = asset('storage/' . $path);
            $request->merge(['CoverImageURL' => $coverImagePath]);
        }
        else{
            $request->merge(['CoverImageURL' => $book->CoverImageURL]);
        }
        if ($book->update($request->all())) {
            return redirect()->route('books.show',$book)->with('success', "Update successsfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        if ($book->delete()) {
            return redirect()->route("books.index")->with('success', "Delete id : $book->BookID successfully");
        }
    }
}

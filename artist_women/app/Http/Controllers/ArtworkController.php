<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Show all artists');
        if (Session::has("success") && Session('success')=="Add new successfully") {
            $elements = Artwork::orderBy('id', 'desc')->paginate(5);
        } else {
            $elements = Artwork::paginate(5);
        }
        return view("Artist.index", compact("elements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $arr=['Painting',"Music","Literature"];
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Add artist');
        return view("Artist.add", compact("arr"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->artist_name == "") {
            return redirect()->route('artworks.create')->with("warning", "Please add name of artist");
        } else if ($request->description == "") {
            return redirect()->route('artworks.create')->with("warning", "Please add description of artist");
        } else if ($request->media_link == "") {
            return redirect()->route('artworks.create')->with("warning", "Please add media link of artist");
        } else {
            if ($request->hasFile('cover_image')) {
                $coverImage = $request->file('cover_image');
                $coverImageName = $coverImage->getClientOriginalName();
                $coverImage->move('img', $coverImageName);
                $coverImagePath = '/img/' . $coverImageName;
                $request->merge(['cover_img' => $coverImagePath]);
            } else {
                return redirect()->route('artworks.create')->with("warning", "Please add image of artist");
            }
            if (Artwork::create($request->all())) {
                return redirect()->route('artworks.index')->with('success', 'Add new successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', "Show Id: $artwork->id");
        return view('Artist.show',compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        //
        $arr=['Painting',"Music","Literature"];
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', "Edit Id: $artwork->id");
        return view('Artist.update',compact('artwork','arr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
        if ($request->artist_name == "") {
            return redirect()->route('artworks.edit',['artwork'=>$artwork])->with("warning", "Please add name of artist");
        } else if ($request->description == "") {
            return redirect()->route('artworks.edit',['artwork'=>$artwork])->with("warning", "Please add description of artist");
        } else if ($request->media_link == "") {
            return redirect()->route('artworks.edit',['artwork'=>$artwork])->with("warning", "Please add media link of artist");
        } else{
            if ($request->hasFile('cover_image')) {
                $coverImage = $request->file('cover_image');
                $coverImageName = $coverImage->getClientOriginalName();
                $coverImage->move('img', $coverImageName);
                $coverImagePath = '/img/' . $coverImageName;
                $request->merge(['cover_img' => $coverImagePath]);
            } else {
                $request->merge(['cover_img'=>$artwork->cover_img]);
            }
            if ($artwork->update($request->all())) {
                return redirect()->route('artworks.show',['artwork'=>$artwork])->with('success', "Update successsfully");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        //
        if ($artwork->delete()) {
            return redirect()->route('artworks.index')->with('success',"Delete Id: $artwork->id successfully");
        }
    }
}

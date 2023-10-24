<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Show all majors');
        
        $elements = Major::orderBy('updated_at', 'desc')->paginate(10);
        return view("Major.index", compact("elements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Add new major');
        return view("Major.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->name == "") {
            return redirect()->route('majors.create')->with("warning", "Name of major can't null!");
        } else if ($request->description == "") {
            return redirect()->route('majors.create')->with("warning", "Description of major can't null!");
        }
        if (Major::create($request->all())) {
            return redirect()->route('majors.index')->with("success", "Add new major successfully");
        } else {
            return redirect()->route('majors.create')->with("error", "Add new major don't successfully");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', "Show Id: $major->id");
        return view('Major.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', "Edit Id: $major->id");
        return view('Major.update', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        //
        if ($request->name == "") {
            return redirect()->route('majors.edit', ['major' => $major])->with("warning", "Please add name of artist");
        } else if ($request->description == "") {
            return redirect()->route('majors.edit', ['major' => $major])->with("warning", "Please add description of artist");
        } 
        if ($major->update($request->all())) {
            return redirect()->route('majors.show', ['major' => $major])->with('success', "Update successsfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        //
        if ($major->delete()) {
            return redirect()->route('majors.index')->with('success', "Delete $major->name successfully");
        } else {
            return redirect('/');
        }
    }
}

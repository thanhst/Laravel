<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $totalRecords=ceil(Author::count() /10);
        $page= $request->query('page');
        if($page=="" ||$page<1|| $page>$totalRecords)
        {
            $page=1;
        }
        $authors = Author::select()->limit(10)->skip(($page-1)*10)->get();// 
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Hiển thị danh sách tác giả');
        return view("Author.index",compact("authors",'page','totalRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Thêm mới tác giả');
        return view("Author.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->name== "")
        {
            return redirect()->route("Author.create")->with("warning","Vui lòng nhập tên tác giả!");
        }
        else if($request->bio==""){
            return redirect()->route("Author.create")->with("warning","Vui lòng nhập tiểu sử tác giả!");
        }
        else if(Author::create($request->all())){
            return redirect()->route('Author.index')->with('success','Thêm thành công!');
        }
        else{
            return redirect()->route("Author.create")->with("error","Thêm tác giả thất bại!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $author=Author::find($id);
        return view("Author.update",compact("author"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author=Author::find($id);
        return view("Author.update",compact("author"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        //
        $author = Author::find($id);
        if (!$author) {
            return redirect()->route('Author.index')->with('error', "Không tìm thấy thông tin lớp!");
        } else {
            if ($request->input('name') == "") {
                return redirect()->route('Author.edit',['Author'=>$author->id])->with("warning", "Tên lớp không được để rỗng!");
            }
            if ($request->input('bio') == "") {
                return redirect()->route('Author.edit',['Author'=>$author->id])->with("warning", "Tên lớp không được để rỗng!");
            }  
            else if ($author->update(request()->all())) {
                return redirect()->route('Author.index')->with('success', "Sửa đổi lớp: $author->id - $author->name thành công!");
            } else {
                return redirect()->route('home')->with('error', "Sửa đổi không thành công!");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $author=Author::find($id);
        if($author->delete()){
            return redirect()->route('Author.index')->with('success',"Xóa id: $id thành công!"); 
        }
        else{
            return redirect()->route('Author.index')->with('error',"Xóa thất bại!"); 
        }
    }
}

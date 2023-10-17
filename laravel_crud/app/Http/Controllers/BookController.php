<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    {
        //

        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Hiển thị danh sách sách');
        $books = Book::paginate(10);
        return view("Book.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Thêm sách');
        $idBooks = DB::table('books')->pluck('id')->sort();
        return view("Book.add",compact('idBooks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // if($request->title== "")
        // {
        //     return redirect()->route("Book.create")->with("warning","Vui lòng nhập tiêu đề sách!");
        // }
        // else if(Book::create($request->all())){
        //     return redirect()->route('Book.index')->with('success','Thêm thành công!');
        // }
        // else{
        //     return redirect()->route("Book.create")->with("error","Thêm tiêu đề thất bại!");
        // }
        if ($request->title == "") {
            return redirect()->route("Book.create")->with("warning", "Vui lòng nhập tiêu đề sách!");
        } else {
            $data = [
                'title' => $request->title,
                'author_id'=> $request->author_id,
            ];
        
            if (DB::table('books')->insert($data)) {
                return redirect()->route('Book.index')->with('success', 'Thêm thành công!');
            } else {
                return redirect()->route("Book.create")->with("error", "Thêm tiêu đề thất bại!");
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book=Book::find($id);
        $idAuthor=DB::table('authors')->pluck('id')->sort();
        return view("Book.update",compact("book",'idAuthor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $book = Book::find($id);
        if (!$book) {
            return redirect()->route('Book.index')->with('error', "Không tìm thấy thông tin lớp!");
        } else {
            if ($request->input('title') == "") {
                return redirect()->route('Book.edit',['book'=>$book->id])->with("warning", "Tên lớp không được để rỗng!");
            }
            else if ($book->update(request()->all())) {
                return redirect()->route('Book.index')->with('success', "Sửa đổi lớp: $book->id - $book->title thành công!");
            } else {
                return redirect()->route('home')->with('error', "Sửa đổi không thành công!");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        if($book->delete()){
            return redirect()->route('Book.index')->with('success',"Xóa id: $book->id thành công!"); 
        }
        else{
            return redirect()->route('Book.index')->with('error',"Xóa thất bại!"); 
        }
    }
}

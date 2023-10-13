<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $class = Classs::all();
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error")) {
            Session::flash('infor', 'Hiển thị tất cả lớp học phần');
        }
        return view("class.index", compact("class"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error")) {
            Session::flash('infor', 'Thêm lớp học phần');
        }
        return view("class.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //'
        $class = new Classs();
        $class->tenlop = $request->input('nameClass');
        if ($request->input('nameClass') == "") {
            return redirect()->route('Class.create')->with("warning", "Tên lớp không được để rỗng!");
        }
        $class->save();
        if ($class->save()) {
            return redirect()->route('Class.index')->with("success", "Thêm lớp: $class->id - $class->tenlop thành công");
        } else {
            return redirect()->route('Class.create')->with("error", "Thêm không thành công");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $class = Classs::find($id);
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Hiển thị thông tin lớp học phần');
        return view("class.update", compact("class"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $class = Classs::find($id);
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Chỉnh lớp học phần');
        return view("class.update", compact("class"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $class = Classs::find($id);
        if (!$class) {
            return redirect()->route('Class.index')->with('error', "Không tìm thấy thông tin lớp!");
        } else {
            if ($request->input('tenlop') == "") {
                return redirect()->route('Class.edit',['Class'=>$class->id])->with("warning", "Tên lớp không được để rỗng!");
            } else if ($class->update(request()->all())) {
                return redirect()->route('Class.index')->with('success', "Sửa đổi lớp: $class->id - $class->tenlop thành công!");
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
        $class = Classs::find($id);
        if ($class->delete()) {
            return redirect()->route('Class.index')->with('success',"Xóa lớp: $class->id - $class->tenlop thành công");
        } else {
            return redirect('/');
        }
    }
}

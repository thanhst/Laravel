<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Classs;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Hiển thị toàn bộ sinh viên');
        return view("student.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Thêm sinh viên');
        $class = Classs::all();
        return view("student.add", compact("class"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->input('tensinhvien') == "") {
            return redirect()->route("Student.create")->with("warning", "Không được để trống tên sinh viên");
        } else if ($request->input('email') == "") {
            return redirect()->route("Student.create")->with("warning", "Không được để trống email");
        } else if ($request->input('ngaysinh') == "") {
            return redirect()->route("Student.create")->with("warning", "Không được để trống ngày sinh");
        } else  if ($student = Student::create($request->all())) {
            return redirect()->route("Student.index")->with("success", "Thêm sinh viên mã số: $student->id thành công!");
        } else {
            return redirect()->route("Student.create")->with("error", "Thêm sinh viên thất bại");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Hiển thị sinh viên');
        $class = Classs::all();
        $student = Student::find($id);
        return view("student.update", compact(["student", "class"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $class = Classs::all();
        $student = Student::find($id);
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Chỉnh sửa sinh viên');
        return view("student.update", compact(["student", "class"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student = Student::find($id);
        if ($request->input('tensinhvien') == "") {
            return redirect()->route("Student.edit", ['Student' => $student->id])->with("warning", "Không được để trống tên sinh viên");
        } else if ($request->input('email') == "") {
            return redirect()->route("Student.edit", ['Student' => $student->id])->with("warning", "Không được để trống email");
        } else if ($request->input('ngaysinh') == "") {
            return redirect()->route("Student.edit", ['Student' => $student->id])->with("warning", "Không được để trống ngày sinh");
        } else if ($student->update(request()->all())) {
            return redirect()->route('Student.index')->with('success', "Sửa đổi sinh viên: $student->id - $student->tensinhvien thành công!");
        } else {
            return redirect()->route('home')->with('error', "Sửa đổi không thành công!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);
        if ($student->delete()) {
            $message = "Xóa sinh viên: $student->id - $student->tensinhvien thành công";
            return redirect()->route('Student.index')->with('success', $message);
        } else {
            $message = "Xóa thất bại sinh viên $student->tensinhvien";
            return redirect('/')->with('error', $message);
        }
    }
}

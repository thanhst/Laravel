@php
$currentPage="sinhvien"
@endphp
@extends('index.index')
@section('title','Student Page')
@section('main')
<div class="container pt-5 pb-5">
    <div class="container pt-5 pb-5">
        <form action="{{ route('Student.update',['Student'=>$student]) }}" method="post" class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
            @csrf
            @method('PUT')
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Sửa sinh viên</h2>
            </div>
            <div class="input-group"><div class="input-group-text">ID</div><input type="input" name="id" value="<?=$student->id?>" class="form-control bg-gray" readonly style="pointer-events: none;"></div>
            <div class="input-group"><div class="input-group-text">Tên sinh viên</div><input type="name" placeholder="Tên sinh viên" value="<?=$student->tensinhvien?>" name="tensinhvien" class="form-control"></div>
            <div class="input-group"><div class="input-group-text">Email</div><input type="email" placeholder="Email" name="email" value="<?=$student->email?>" class="form-control"></div>
            <div class="input-group"><div class="input-group-text">Ngày sinh</div><input type="date" name="ngaysinh" value="<?=$student->ngaysinh?>" class="form-control"></div>
            <div class="input-group"><div class="input-group-text">Lớp</div><select class="form-control" value="<?=$student->idlop?>" name="idlop">
                <?php foreach($class as $row){?>
                    <option value="<?= $row->id?>"><?= $row->id?></option>
                <?php }?>
            </select></div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
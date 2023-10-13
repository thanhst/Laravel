@php
$currentPage="sinhvien"
@endphp
@extends('index.index')
@section('title','Student Page')
@section('main')
<div class="container pt-5 pb-5">
    <form action="{{route('Student.store')}}" method="post" class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
        @csrf
        @method('POST')
        <div class="nav-head border-bottom d-flex">
            <h2 class="text-white">Thêm sinh viên</h2>
        </div>
        <div class="input-group"><div class="input-group-text">Tên sinh viên</div><input type="name" placeholder="Tên sinh viên" name="tensinhvien" class="form-control"></div>
        <div class="input-group"><div class="input-group-text">Email</div><input type="email" placeholder="Email" name="email" class="form-control"></div>
        <div class="input-group"><div class="input-group-text">Ngày sinh</div><input type="date" name="ngaysinh" class="form-control"></div>
        <div class="input-group"><div class="input-group-text">Lớp</div><select class="form-control" name="idlop">
            <?php foreach($class as $row){?>
                <option value="<?= $row->id?>"><?= $row->id?></option>
            <?php }?>
        </select></div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>    
@endsection
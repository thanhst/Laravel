@php
    $currentPage = 'lop';
@endphp
@section('title', 'Class Page')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <form action="{{ route('Class.update',['Class'=>$class->id]) }}" method="post"
            class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
            @csrf
            @method('PUT')
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Sửa lớp</h2>
            </div>
            <div class="input-group">
                <div class="input-group-text">ID</div><input type="name" name="id" value="<?= $class->id ?>"
                    class="form-control bg-gray" readonly style="pointer-events: none;">
            </div>
            <div class="input-group">
                <div class="input-group-text">Tên lớp</div><input type="name" placeholder="Tên lớp"
                    value="<?= $class->tenlop ?>" name="tenlop" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection

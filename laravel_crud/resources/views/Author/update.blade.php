@php
$currentPage="author"
@endphp
@extends('index.index')
@section('title','Author')
@section('main')
<div class="container pt-5 pb-5">
    <div class="container pt-5 pb-5">
        <form action="{{ route('Author.update',['Author'=>$author]) }}" method="post" class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
            @csrf
            @method('PUT')
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Sửa tác giả</h2>
            </div>
            <div class="input-group"><div class="input-group-text">ID</div><input type="input" name="id" value="<?=$author->id?>" class="form-control bg-gray" readonly style="pointer-events: none;"></div>
            <div class="input-group"><div class="input-group-text">Tên tác giả</div><input type="input" placeholder="Tên tác giả" value="<?=$author->name?>" name="name" class="form-control"></div>
            <div class="input-group"><div class="input-group-text">Tiểu sử</div><input type="input" placeholder="Tiểu sử" name="bio" value="<?=$author->bio?>" class="form-control"></div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
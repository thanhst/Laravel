@php
$currentPage="book"
@endphp
@extends('index.index')
@section('title','Book')
@section('main')
<div class="container pt-5 pb-5">
    <form action="{{route('Book.store')}}" method="post" class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
        @csrf
        @method('POST')
        <div class="nav-head border-bottom d-flex">
            <h2 class="text-white">Thêm sách</h2>
        </div>
        <div class="input-group"><div class="input-group-text">Tiêu đề</div><input type="name" placeholder="Tiêu đề sách" name="title" class="form-control"></div>
        <div class="input-group"><div class="input-group-text">Mã tác giả</div><select class="form-control" name="author_id">
            <?php foreach($idBooks as $row){?>
                <option value="<?= $row?>"><?= $row?></option>
            <?php }?>
        </select></div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>    
@endsection
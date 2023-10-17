@php
    $currentPage = 'book';
@endphp
@extends('index.index')
@section('title', 'Book')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <form action="{{ route('Book.update', ['Book' => $book]) }}" method="post"
                class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
                @csrf
                @method('PUT')
                <div class="nav-head border-bottom d-flex">
                    <h2 class="text-white">Sửa sách</h2>
                </div>
                <div class="input-group">
                    <div class="input-group-text">ID</div><input type="input" name="id" value="<?= $book->id ?>"
                        class="form-control bg-gray" readonly style="pointer-events: none;">
                </div>
                <div class="input-group">
                    <div class="input-group-text">Tiêu đề</div><input type="name" placeholder="Tiêu đề"
                        value="<?= $book->title ?>" name="title" class="form-control">
                </div>
                <div class="input-group">
                    <div class="input-group-text">Mã tác giả</div><select class="form-control" name="author_id">
                        @foreach ($idAuthor as $row)
                            <option value="{{ $row }}" {{ $row == $book->author_id ? 'selected' : '' }}>{{ $row }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    @endsection

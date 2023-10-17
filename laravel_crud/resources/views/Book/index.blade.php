@php
$currentPage="book"
@endphp
@extends('index.index')
@section('title','Book')
@section('main')
<div class="container pt-5 pb-5">
    <a href="{{ route('Book.create') }}"><button class="btn btn-success">Thêm mới</button></a>
    <div class="">
        <div class="d-flex justify-content-between mt-3">
            <table class="table_infor w-100">
                <thead>
                    <tr class="border-bottom">
                        <th>#</th>
                        <th>Mã tác giả</th>
                        <th>Tiêu đề</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) { ?>
                        <tr class="border-bottom">
                            <td><?= $book->id?></td>
                            <td><?= $book->author_id?></td>
                            <td><?= $book->title?></td>
                            <td><a class="nav-link text-blue" href="{{ route('Book.edit',['Book'=>$book->id]) }}"><i class="bi bi-pen"></i></a></td>
                            <td><a class="nav-link text-blue" data-bs-toggle="modal" data-bs-target="#Modal<?=$book->id?>" href=""><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <div class="modal fade" id="Modal<?=$book->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Đồng ý xóa sách : <?= $book->title ?>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('Book.destroy',['Book'=>$book->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    @include('layouts.paginationLaravel')
@endsection
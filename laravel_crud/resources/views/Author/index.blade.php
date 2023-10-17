@php
$currentPage="author"
@endphp
@extends('index.index')
@section('title','Author')
@section('main')
<div class="container pt-5 pb-5">
    <a href="{{ route('Author.create') }}"><button class="btn btn-success">Thêm mới</button></a>
    <div>
        <div class="d-flex justify-content-between mt-3">
            <table class="table_infor w-100">
                <thead>
                    <tr class="border-bottom">
                        <th>#</th>
                        <th>Tên tác giả</th>
                        <th>Tiểu sử</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($authors as $row) { ?>
                        <tr class="border-bottom">
                            <td><?= $row->id?></td>
                            <td><?= $row->name?></td>
                            <td><?= $row->bio?></td>
                            <td><a class="nav-link text-blue" href="{{ route('Author.edit',['Author'=>$row]) }}"><i class="bi bi-pen"></i></a></td>
                            <td><a class="nav-link text-blue" data-bs-toggle="modal" data-bs-target="#Modal<?=$row->id?>" href=""><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <div class="modal fade" id="Modal<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Đồng ý xóa tác giả : <?= $row->name ?>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('Author.destroy',['Author'=>$row->id])}}" method="POST">
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
    @include('layouts.pagination')
@endsection
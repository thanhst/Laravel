@php
$currentPage="sinhvien"
@endphp
@extends('index.index')
@section('title','Student Page')
@section('main')
<div class="container pt-5 pb-5">
    <a href="{{ route('Student.create') }}"><button class="btn btn-success">Thêm mới</button></a>
    <div class="d-flex justify-content-between mt-3">
        <table class="table_infor w-100">
            <thead>
                <tr class="border-bottom">
                    <th>#</th>
                    <th>Tên sinh viên</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $row) { ?>
                    <tr class="border-bottom">
                        <td><?= $row->id?></td>
                        <td><?= $row->tensinhvien?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->ngaysinh ?></td>
                        <td><?= $row->idlop ?></td>
                        <td><a class="nav-link text-blue" href="{{ route('Student.edit',['Student'=>$row]) }}"?><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a class="nav-link text-blue" data-bs-toggle="modal" data-bs-target="#Modal<?=$row->id?>" href=""><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <div class="modal fade" id="Modal<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Đồng ý xóa sinh viên : <?= $row->tensinhvien ?>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('Student.destroy',['Student'=>$row])}}" method="POST">
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
@endsection
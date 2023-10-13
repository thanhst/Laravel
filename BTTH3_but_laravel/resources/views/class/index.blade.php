@php
    $currentPage = 'lop';
@endphp
@section('title', 'Class Page')
@extends("index.index")
@section('main')
<div class="container pt-5 pb-5">
    <a href="{{ route('Class.create') }}" button class="btn btn-success">Thêm mới</button></a>
    <div class="d-flex justify-content-between mt-3">
        <table class="table_infor w-100">
            <thead>
                <tr class="border-bottom">
                    <th>#</th>
                    <th>Tên lớp</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php   foreach ($class as $row){?>
                    <tr class="border-bottom">
                        <td><?= $row->id; ?></td>
                        <td><?= $row->tenlop; ?></td>
                        <td><a class="nav-link text-blue" href="{{ route('Class.edit',['Class'=>$row->id]) }}"> <i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a class="nav-link text-blue" data-bs-toggle="modal" data-bs-target="#Modal<?=$row->id;?>" href=""><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <div class="modal fade" id="Modal<?=$row->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Đồng ý xóa lớp :<?= $row->tenlop?>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('Class.destroy',['Class'=>$row->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </tbody>
        </table>
    </div>
@endsection
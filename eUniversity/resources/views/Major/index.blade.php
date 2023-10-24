@extends('index.index')
@section('title', 'Major')
@php
    $currentPage = 'major';
@endphp
@section('main')
    <div class="container pt-5 pb-5">
        <a href="{{ route('majors.create') }}" style="width:100px;" class="btn btn-success">Add</a>
        <div class="width-medium">
            <div class="d-flex justify-content-between mt-3">
                <table class="table table_infor w-100 table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($elements as $major){?>
                        <tr class="border-bottom">
                            <td><?= $major->id ?></td>
                            <td><?= $major->name ?></td>
                            <td><?= $major->description ?></td>
                            <td><?= $major->duration?> year</td>
                            <td><a class="nav-link text-blue"
                                href="{{ route('majors.show', ['major' => $major->id]) }}"> <i
                                    class="bi bi-book fs-4"></i></a></td>
                            <td><a class="nav-link text-blue"
                                    href="{{ route('majors.edit', ['major' => $major->id]) }}"> <i
                                        class="bi bi-pen fs-4"></i></a></td>
                            <td><a class="nav-link text-blue" data-bs-toggle="modal"
                                    data-bs-target="#Modal<?= $major->id ?>" href=""><i
                                        class="bi bi-trash-fill  fs-4"></i></a></td>
                        </tr>
                        <div class="modal fade" id="Modal<?= $major->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete: <?= $major->name ?>, with id : <?= $major->id ?>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('majors.destroy', ['major' => $major->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        @include('layouts.paginationLaravel')
    @endsection

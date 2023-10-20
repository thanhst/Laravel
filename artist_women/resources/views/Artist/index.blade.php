@extends('index.index')
@section('title', 'Artwork')
@php
    $currentPage = 'artist';
@endphp
@section('main')
    <div class="container pt-5 pb-5">
        <a href="{{ route('artworks.create') }}" style="width:100px;" class="btn btn-success">Add</a>
        <div class="width-medium">
            <div class="d-flex justify-content-between mt-3">
                <table class="table_infor w-100">
                    <thead>
                        <tr class="border-bottom">
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Art type</th>
                            <th>Media link</th>
                            <th>Cover image</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($elements as $artwork){?>
                        <tr class="border-bottom">
                            <td><?= $artwork->id ?></td>
                            <td><?= $artwork->artist_name ?></td>
                            <td><?= $artwork->description ?></td>
                            <td><?= $artwork->art_type ?></td>
                            <td><?= $artwork->media_link ?></td>
                            <td><img src="<?= $artwork->cover_img ?>" alt="" style="height:100px;width:100px;"></td>
                            <td><a class="nav-link text-blue"
                                href="{{ route('artworks.show', ['artwork' => $artwork->id]) }}"> <i
                                    class="bi bi-book fs-4"></i></a></td>
                            <td><a class="nav-link text-blue"
                                    href="{{ route('artworks.edit', ['artwork' => $artwork->id]) }}"> <i
                                        class="bi bi-pen fs-4"></i></a></td>
                            <td><a class="nav-link text-blue" data-bs-toggle="modal"
                                    data-bs-target="#Modal<?= $artwork->id ?>" href=""><i
                                        class="bi bi-trash-fill  fs-4"></i></a></td>
                        </tr>
                        <div class="modal fade" id="Modal<?= $artwork->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete: <?= $artwork->artist_name ?>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('artworks.destroy', ['artwork' => $artwork->id]) }}"
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

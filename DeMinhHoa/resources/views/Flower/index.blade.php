@extends('index.index')
@section('title', 'Flower')
@php
    $currentPage = 'flower';
@endphp
@section('main')
    <div class="container pt-5 pb-5">
        <a href="{{ route('flowers.create') }}" style="width:100px;" class="btn btn-success">Add</a>
        <div class="width-medium">
            <div class="d-flex justify-content-between mt-3">
                <table class="table table_infor w-100 table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Region</th>
                            <th>Image</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($elements as $flower){?>
                        <tr class="border-bottom">
                            <td><?= $flower->id ?></td>
                            <td><?= $flower->name ?></td>
                            <td><?= $flower->description ?></td>
                            <td>
                                @if ($flower->regions->isNotEmpty())
                                    <ul class="p-0 m-0" style="list-style-type:square;">
                                        @foreach ($flower->regions as $region_name)
                                            <li>
                                                {{ $region_name->region_name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <h6>None region</h6>
                                @endif
                            </td>
                            <td><img src="<?= $flower->image_url ?>" alt=""
                                    style="height:75px;width:75px; border-radius:10px; border:1px solid rgba(0,0,0,0.3)">
                            </td>
                            <td><a class="nav-link text-blue" href="{{ route('flowers.show', ['flower' => $flower->id]) }}">
                                    <i class="bi bi-book fs-4"></i></a></td>
                            <td><a class="nav-link text-blue" href="{{ route('flowers.edit', ['flower' => $flower->id]) }}">
                                    <i class="bi bi-pen fs-4"></i></a></td>
                            <td><a class="nav-link text-blue" data-bs-toggle="modal"
                                    data-bs-target="#Modal<?= $flower->id ?>" href=""><i
                                        class="bi bi-trash-fill  fs-4"></i></a></td>
                        </tr>
                        <div class="modal fade" id="Modal<?= $flower->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete: <?= $flower->artist_name ?>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('flowers.destroy', ['flower' => $flower->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Exit</button>
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

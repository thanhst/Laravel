@extends('index.index')
@section('title', 'Book')
@php
    $currentPage = 'book';
@endphp
@section('main')
    <div class="container pt-5 pb-5">
        <a href="{{ route('books.create') }}" style="width:100px;" class="btn btn-success">Add</a>
        <div class="width-medium">
            <div class="d-flex justify-content-between mt-3">
                <table class="table table_infor w-100 table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Publication Year</th>
                            <th>ISBN</th>
                            <th>Cover image URL</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($elements as $book){?>
                        <tr class="border-bottom">
                            <td><?= $book->BookID ?></td>
                            <td><?= $book->Title ?></td>
                            <td><?= $book->Author ?></td>
                            <td><?= $book->Genre ?></td>
                            <td><?= $book->PublicationYear ?></td>
                            <td><?= $book->ISBN ?></td>
                            <td><img src="<?= $book->CoverImageURL ?>" alt="" style="height:75px;width:75px; border-radius:10px; border:1px solid rgba(0,0,0,0.3)"></td>
                            <td><a class="nav-link text-blue"
                                href="{{ route('books.show', ['book' => $book->BookID]) }}"> <i
                                    class="bi bi-book fs-4"></i></a></td>
                            <td><a class="nav-link text-blue"
                                    href="{{ route('books.edit', ['book' => $book->BookID]) }}"> <i
                                        class="bi bi-pen fs-4"></i></a></td>
                            <td><a class="nav-link text-blue" data-bs-toggle="modal"
                                    data-bs-target="#Modal<?= $book->BookID ?>" href=""><i
                                        class="bi bi-trash-fill  fs-4"></i></a></td>
                        </tr>
                        <div class="modal fade" id="Modal<?= $book->BookID ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete: <?= $book->Title ?>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('books.destroy', ['book' => $book->BookID]) }}"
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

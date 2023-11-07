@php
    $currentPage = 'artist';
@endphp
@section('title', 'book')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <div class="m-auto w-75 p-5 bg-gray rounded-3 d-flex flex-column gap-3 pb-3 pt-3">
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Detail</h2>
            </div>
            <div class="d-flex gap-5 pb-3 pt-3">
                <div class="col-3 d-flex flex-column gap-4 border-right pt-3">
                    <img src="{{ $book->CoverImageURL }}" style="width:200px;height:200px;border-radius:10px;">
                </div>
                <div class="col-9 d-flex justify-content-center container">
                    <div class="container-fluid text-white">
                        <div>
                            <div class="title">
                                <h1 class="text-blue">{{ $book->Title }}</h1></h1>
                            </div>
                            <div class="d-flex gap-1"><p class="fw-bold">Title:</p><p><?= $book->Title ?></p></div>
                            <div class="d-flex gap-1"><p class="fw-bold">Author:</p><p><?= $book->Author ?></p></div>
                            <div class="d-flex gap-1"><p class="fw-bold">Genre:</p><p><?= $book->Genre ?></p></div>
                            <div class="d-flex gap-1"><p class="fw-bold">Publication Year:</p><p><?= $book->PublicationYear ?></p></div>
                            <div class="d-flex gap-1"><p class="fw-bold">ISBN:</p><p><?= $book->ISBN ?></p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="editForm d-flex justify-content-center mb-3">
                <div class="w-25 d-flex justify-content-between">
                    <a href="{{route('books.edit',['book'=>$book])}}" class="btn btn-success">Edit</a>
                    <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

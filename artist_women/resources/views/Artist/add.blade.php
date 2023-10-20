@php
    $currentPage = 'artist';
@endphp
@section('title', 'Artwork')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <form enctype="multipart/form-data" action="{{ route('artworks.store') }}" method="POST"
            class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
            @csrf
            @method('POST')
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Add artist</h2>
            </div>
            <div class="input-group">
                <div class="input-group-text">Name</div><input type="input" placeholder="Name of artist" name="artist_name"
                    class="form-control">
            </div>
            <div class="input-group">
                <div class="input-group-text">Description</div><input type="input" placeholder="Description of artist"
                    name="description" class="form-control">
            </div>
            <div class="input-group">
                <div class="input-group-text">Artist type</div><select name="art_type" class="form-control">
                    @foreach ($arr as $element)
                        {
                        <option value="{{ $element }}">{{ $element }}</option>
                        }
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <div class="input-group-text">Media link</div><input type="url" placeholder="Media link"
                    name="media_link" class="form-control">
            </div>
            <div class="input-group">
                <div class="input-group-text">Cover image</div><input type="file" accept="image/*" name="cover_image"
                    class="form-control">
            </div>
            <div class="d-flex justify-content-around">
                <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#ModalAdd" type="submit"
                    class="btn btn-success">Add</a>
                <a href="{{ route('artworks.index') }}" class="btn btn-primary">Exit</a>
            </div>
            <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to create new artist ?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

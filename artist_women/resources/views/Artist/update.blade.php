@php
    $currentPage = 'artist';
@endphp
@section('title', 'Artwork')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <div class="m-auto w-75 p-5 bg-gray rounded-3 d-flex flex-column gap-3 pb-3 pt-3">
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Edit</h2>
            </div>
            <form class="d-flex gap-5 pb-3 pt-3" method="POST" enctype="multipart/form-data"
                action="{{ route('artworks.update', ['artwork' => $artwork]) }}">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column gap-4 border-right pt-3 ">
                    <label class="image-input flex-column-reverse d-flex" for="image-input" style="cursor: pointer;">
                        <div style="cursor: pointer;height:40px;width:200px"
                            class="position-absolute ps-1 bg-blur rounded d-flex align-items-center">
                            <h6 class="text-white ms-1">Click me to change image</h6>
                        </div>
                        <img class="img-show" src="{{ $artwork->cover_img }}">
                    </label>
                    <input type="file" id="image-input" name="cover_image" accept="image/*" class="form-control"
                        style="display: none;">
                    <h5 class="text-white">{{ $artwork->artist_name }}</h5>
                </div>
                <div class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-3">

                    <div class="input-group">
                        <div class="input-group-text">Id</div><input type="input" readonly style="pointer-events: none"
                            placeholder="Id of artist" name="id" class="form-control bg-readonly"
                            value="{{ $artwork->id }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Name</div><input type="input" placeholder="Name of artist"
                            name="artist_name" class="form-control" value="{{ $artwork->artist_name }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Description</div><input type="input"
                            placeholder="Description of artist" name="description" class="form-control"
                            value="{{ $artwork->description }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Artist type</div><select name="art_type" class="form-control">
                            @foreach ($arr as $element)
                                {
                                <option value="{{ $element }}" {{ $element == $artwork->art_type ? 'selected' : '' }}>
                                    {{ $element }}</option>
                                }
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Media link</div><input type="url" placeholder="Media link"
                            value="{{ $artwork->media_link }}" name="media_link" class="form-control">
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#Modal<?= $artwork->id ?>"
                            type="submit" class="btn btn-success">Update now</a>
                        <a href="{{ route('artworks.index') }}" class="btn btn-primary">Exit</a>
                    </div>
                </div>
                <div class="modal fade" id="Modal<?= $artwork->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to update: <?= $artwork->artist_name ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/imgChange.js') }}"></script>
@endsection

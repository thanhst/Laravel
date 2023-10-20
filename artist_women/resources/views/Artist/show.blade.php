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
                <h2 class="text-white">Detail</h2>
            </div>
            <div class="d-flex gap-5 pb-3 pt-3">
                <div class="d-flex flex-column gap-4 border-right pt-3">
                    <img src="{{ $artwork->cover_img }}" style="width:200px;height:200px;border-radius:10px;">
                    <h5 class="text-white">{{ $artwork->artist_name }}</h5>
                </div>
                <div class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">

                    <div class="input-group">
                        <div class="input-group-text">Id</div><input type="input" readonly placeholder="Id of artist"
                            name="id" class="form-control" value="{{ $artwork->id }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Name</div><input type="input" readonly placeholder="Name of artist"
                            name="artist_name" class="form-control" value="{{ $artwork->artist_name }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Description</div><input type="input" readonly
                            placeholder="Description of artist" name="description" class="form-control"
                            value="{{ $artwork->description }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Artist type</div><input readonly name="art_type" class="form-control"
                            value="{{ $artwork->art_type }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Media link</div><input readonly type="url"
                            placeholder="Media link" value="{{ $artwork->media_link }}" name="media_link"
                            class="form-control">
                    </div>
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('artworks.edit', ['artwork' => $artwork]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('artworks.index') }}" class="btn btn-primary">Exit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

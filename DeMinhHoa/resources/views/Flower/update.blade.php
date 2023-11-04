@php
    $currentPage = 'flower';
@endphp
@section('title', 'Flower')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <div class="m-auto w-75 p-5 bg-gray rounded-3 d-flex flex-column gap-3 pb-3 pt-3">
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Edit</h2>
            </div>
            <form class="d-flex gap-5 pb-3 pt-3" method="POST" enctype="multipart/form-data"
                action="{{ route('flowers.update', ['flower' => $flower]) }}">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column gap-4 border-right pt-3 ">
                    <label class="image-input flex-column-reverse d-flex" for="image-input" style="cursor: pointer;">
                        <div style="cursor: pointer;height:40px;width:200px"
                            class="position-absolute ps-1 bg-blur rounded d-flex align-items-center">
                            <h6 class="text-white ms-1">Click me to change image</h6>
                        </div>
                        <img class="img-show" src="{{ $flower->image_url }}">
                    </label>
                    <input type="file" id="image-input" name="cover_image" accept="image/*" class="form-control"
                        style="display: none;">
                    <h5 class="text-white">{{ $flower->name }}</h5>
                </div>
                <div class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-3">

                    <div class="input-group">
                        <div class="input-group-text">Id</div><input type="input" readonly style="pointer-events: none"
                            placeholder="Id of flower" name="id" class="form-control bg-readonly"
                            value="{{ $flower->id }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Name</div><input type="input" placeholder="Name of flower"
                            name="name" class="form-control" value="{{ $flower->name }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Description</div><input type="input"
                            placeholder="Description of flower" name="description" class="form-control"
                            value="{{ $flower->description }}">
                    </div>
                    <div class="bg-white rounded p-3 pt-0">
                        <div class="pt-3 pb-3">Regions</div>
                        <div class="d-flex row ms-3 me-3">
                            @foreach ($regionNames as $region_name)
                                <div class="form-check text-blue col-3 mb-1">
                                    <label class="form-check-label">{{ $region_name }}</label>
                                    <input type="checkbox" name="region[]" class="form-check-input"
                                        value="{{ $region_name }}"
                                        @foreach ($flower->regions as $region)
                                        {{ $region->region_name == $region_name ? 'checked' : '' }} @endforeach>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#Modal<?= $flower->id ?>"
                            type="submit" class="btn btn-success">Update now</a>
                        <a href="{{ route('flowers.index') }}" class="btn btn-primary">Exit</a>
                    </div>
                </div>
                <div class="modal fade" id="Modal<?= $flower->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to update: <?= $flower->name ?>
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
    @if ($errors->any())
        <div class="bg-error error-area p-3 m-auto d-block" id="error-area">
            <div class="w-100 d-flex">
                <h5>Something went wrong, please check error in here!</h5>
                <div class="d-flex justify-content-end align-item-center"><button class="btn btn-close"
                        onclick="closeError()"></button> </div>
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="{{ asset('js/imgChange.js') }}"></script>
@endsection

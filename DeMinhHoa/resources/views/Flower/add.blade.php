@php
    $currentPage = 'flower';
@endphp
@section('title', 'Flower')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <form enctype="multipart/form-data" action="{{ route('flowers.store') }}" method="POST"
            class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
            @csrf
            @method('POST')
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Add flower</h2>
            </div>
            <div class="input-group">
                <div class="input-group-text">Name</div><input type="input" placeholder="Name of flower" name="name"
                    class="form-control">
            </div>
            <div class="input-group">
                <div class="input-group-text">Description</div><input type="input" placeholder="Description of flower"
                    name="description" class="form-control">
            </div>
            <div class="bg-white rounded p-3 pt-0">
                <div class="pt-3 pb-3">Regions</div>
                <div class="d-flex row ms-3 me-3">
                    @foreach ($regionNames as $region_name)
                        <div class="form-check text-blue col-3 mb-1">
                            <label class="form-check-label">{{ $region_name }}</label>
                            <input type="checkbox" name="region[]" class="form-check-input" value="{{ $region_name }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="input-group">
                <div class="input-group-text">Image</div><input type="file" accept="image/*" name="cover_image"
                    class="form-control">
            </div>
            <div class="d-flex justify-content-around">
                <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#ModalAdd" type="submit"
                    class="btn btn-success">Add</a>
                <a href="{{ route('flowers.index') }}" class="btn btn-primary">Exit</a>
            </div>
            <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to create new flower ?
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
    @if ($errors->any())
        <div class="bg-error error-area p-3 m-auto d-block" id="error-area">
            <div class="w-100 d-flex">
                <h5>Something went wrong, please check error in here!</h5>
                <div class="d-flex justify-content-end align-item-center"><button class="btn btn-close" onclick="closeError()"></button> </div>
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

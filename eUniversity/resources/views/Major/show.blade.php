@php
    $currentPage = 'major';
@endphp
@section('title', 'Major')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <div class="m-auto w-75 p-5 bg-gray rounded-3 d-flex flex-column gap-3 pb-3 pt-3">
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Detail</h2>
            </div>
            <div class="d-flex gap-5 pb-3 pt-3">
                <div class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">

                    <div class="input-group">
                        <div class="input-group-text">Id</div><input type="input" readonly placeholder="Id of artist"
                            name="id" class="form-control" value="{{ $major->id }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Name</div><input type="input" readonly placeholder="Name of Major"
                            name="name" class="form-control" value="{{ $major->name }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Description</div><textarea type="input" readonly
                            placeholder="Description of artist" name="description" class="form-control"
                            value="{{ $major->description }}">{{ $major->description }}</textarea>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Major duration</div><input name="duration" class="form-control" value="{{ $major->duration }} year" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Created at</div><input name="duration" class="form-control" value="{{ $major->created_at }}" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Updated at</div><input name="duration" class="form-control" value="{{ $major->updated_at }}" readonly>
                    </div>
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('majors.edit', ['major' => $major]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('majors.index') }}" class="btn btn-primary">Exit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

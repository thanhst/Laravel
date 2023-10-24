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
                <h2 class="text-white">Edit</h2>
            </div>
            <form class="d-flex gap-5 pb-3 pt-3" method="POST" action="{{ route('majors.update', ['major' => $major]) }}">
                @csrf
                @method('PUT')
                <div class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-3">

                    <div class="input-group">
                        <div class="input-group-text">Id</div><input type="input" readonly style="pointer-events: none"
                            placeholder="Id of major" name="id" class="form-control bg-readonly"
                            value="{{ $major->id }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Name</div><input type="input" placeholder="Name of major"
                            name="name" class="form-control" value="{{ $major->name }}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Description</div><textarea type="input"
                            placeholder="Description of major" name="description" class="form-control"
                            value="{{ $major->description }}">{{ $major->description }}</textarea>
                    </div>
                    <div class="input-group">
                        <div class="input-group-text">Major duration</div><select name="duration" class="form-control">
                            @for ($i=1;$i<=6;$i++)
                            <option value="{{$i}}" {{ $i == $major->duration ? "selected":"" }}>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#Modal<?= $major->id ?>"
                            type="submit" class="btn btn-success">Update now</a>
                        <a href="{{ route('majors.index') }}" class="btn btn-primary">Exit</a>
                    </div>
                </div>
                <div class="modal fade" id="Modal<?= $major->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to update: <?= $major->name ?>
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

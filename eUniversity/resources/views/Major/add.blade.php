@php
    $currentPage = 'major';
@endphp
@section('title', 'Major')
@extends('index.index')
@section('main')
    <div class="container pt-5 pb-5">
        <div class="nofication m-auto"></div>
        <form action="{{ route('majors.store') }}" method="POST"
            class="m-auto form-group p-3 bg-gray rounded-3 d-flex flex-column gap-3 pb-5">
            @csrf
            @method('POST')
            <div class="nav-head border-bottom d-flex">
                <h2 class="text-white">Add major</h2>
            </div>
            <div class="input-group">
                <div class="input-group-text">Name</div><input type="input" placeholder="Name of Major" name="name"
                    class="form-control">
            </div>
            <div class="input-group">
                <div class="input-group-text">Description</div><input type="input" placeholder="Description of Major"
                    name="description" class="form-control">
            </div>
            <div class="input-group">
                <div class="input-group-text">Major duration</div><select name="duration" class="form-control">
                    @for ($i=1;$i<=6;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="d-flex justify-content-around">
                <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#ModalAdd" type="submit"
                    class="btn btn-success">Add</a>
                <a href="{{ route('majors.index') }}" class="btn btn-primary">Exit</a>
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
                            Are you sure to create new Major ?
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

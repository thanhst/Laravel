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
                <h2 class="text-white">Detail</h2>
            </div>
            <div class="d-flex gap-5 pb-3 pt-3">
                <div class="col-3 d-flex flex-column gap-4 border-right pt-3">
                    <img src="{{ $flower->image_url }}" style="width:200px;height:200px;border-radius:10px;">
                </div>
                <div class="col-9 d-flex justify-content-center container">
                    <div class="container-fluid text-white">
                        <div>
                            <div class="title">
                                <h1 class="text-blue">ID: {{ $flower->id }}</h1>
                            </div>
                            <div class="d-flex gap-1">
                                <p class="fw-bold">Name:</p>
                                <p><?= $flower->name ?></p>
                            </div>
                            <div class="d-flex gap-1">
                                <p class="fw-bold">Description:</p>
                                <p><?= $flower->description ?></p>
                            </div>
                            <div class="gap-1">
                                <p class="fw-bold">Regions:</p>
                                <div class="ms-5">
                                    @if ($flower->regions->isNotEmpty())
                                        <ul class="p-0 m-3" style="list-style-type:square;">
                                            @foreach ($flower->regions as $region_name)
                                                <li>
                                                    {{ $region_name->region_name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <h6>None region</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="editForm d-flex justify-content-center mb-3">
                <div class="w-25 d-flex justify-content-between">
                    <a href="{{ route('flowers.edit', ['flower' => $flower]) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('flowers.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

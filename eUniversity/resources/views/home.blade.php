@extends('index.index')
@section('title', 'Home')
@php
    $currentPage="home";
@endphp
@section('main')
    <div class="d-flex justify-content-center container pt-5 pb-5 align-items-center">
        <div class="d-flex">
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h6 class="card-title text-blue">Number of majors</h6>
                    <h5><?= $allMajors ?></h5>
                </div>
            </div>
        </div>
    </div>
@endsection

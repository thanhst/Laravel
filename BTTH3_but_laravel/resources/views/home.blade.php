@php
    $currentPage = 'trangchu';
@endphp
@extends('index.index')
@section('title', 'HomePage')
@section('main')
    <div class="d-flex justify-content-center container pt-5 pb-5 align-items-center">
        <div class="w-50 d-flex justify-content-between">
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h6 class="card-title text-blue">Sinh viên</h6>
                    <h5><?=$studentsCount?></h5>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body d-flex flex-column align-items-center">
                    <h6 class="card-title text-blue">Lớp</h6>
                    <h5><?=$classsCount?></h5>
                </div>
            </div>
        </div>
   </div>
@endsection

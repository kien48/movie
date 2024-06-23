@extends('layouts.master')
@section('title')
    Danh sách yêu thích
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">

    <div class="row mb-5">
        <div class="col mb-1">
            <div id="" class="d-flex justify-content-between">
                <h2>Phim yêu thích</h2>
            </div>
            <div class="row">
                @foreach(session('favourite') as $data)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                        <a href="{{route('detail',$data->slug)}}" class="nav-link" data-bs-toggle="tooltip" title="{{$data->ten}}">
                            <img src="{{$data->anh}}" alt="" class="img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection

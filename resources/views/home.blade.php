@extends('layouts.master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row mb-5">
            <div class="col mb-1">
                <div id="phimmoithem" class="d-flex justify-content-between">
                    <h2>Phim mới thêm</h2>
                </div>
                <div class="row">
                    @foreach($dataPhimMoiThem as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{route('detail',$data->slug)}}" class="nav-link">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimle" class="d-flex justify-content-between">
                    <h2>Phim lẻ</h2>
                    <a href="{{route('lists',1)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimLe as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card  mb-3 mt-3">
                            <a href="{{route('detail',$data->slug)}}" class="nav-link">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimbo" class="d-flex justify-content-between ">
                    <h2>Phim bộ</h2>
                    <a href="{{route('lists',2)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimBo as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card  mb-3 mt-3">
                            <a href="{{route('detail',$data->slug)}}" class="nav-link">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="tv" class="d-flex justify-content-between">
                    <h2>TV Shows</h2>
                    <a href="{{route('lists',3)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataTvShows as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card  mb-3 mt-3">
                            <a href="{{route('detail',$data->slug)}}" class="nav-link">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('title')
Lọc phim
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">

        <div class="row mb-5">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between">
                    <h2>Lọc phim</h2>
                </div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-4">
                            <input name="" type="text" class="form-control form-control-lg w-100" placeholder="Tìm kiếm">
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-lg w-100">
                                <option selected>Thể loại</option>
                                <option>Hài</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-select form-select-lg w-100">
                                <option selected>Danh sách</option>
                                <option>Phim bộ</option>
                            </select>
                        </div>
                        <div class="col-4 mt-4">
                            <select class="form-select form-select-lg w-100">
                                <option selected>Năm phát hành</option>
                                @for($nam = 1990; $nam <= date('Y'); $nam ++)
                                    <option value="{{$nam}}">{{$nam}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-danger btn-lg w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>



                </form>
{{--                <div class="row">--}}
{{--                    @foreach($data as $item)--}}
{{--                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">--}}
{{--                            <a href="{{route('detail',$item->slug)}}" class="nav-link">--}}
{{--                                <img src="{{$item->anh}}" alt="" class="img-fluid">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection


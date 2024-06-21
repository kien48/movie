@extends('layouts.master')
@section('title')
    Chi tiết phim
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row">
            <div class="col-3">
                <img src="{{$model['anh']}}" alt="" class="img-fluid" style="border-radius: 10px;">
            </div>
            <div class="col-9">
                <h3 class="mb-3" style="font-weight: 700;font-size: 50px;">{{$model['ten']}} </h3>
                <h5 class="font-monospace text-light-emphasis mt-3">{{$model['chat_luong']}}  ● {{$model['ngon_ngu']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Số tập: {{$model['so_tap']}} | Hiện tại: {{$model['trang_thai']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Thể loại: Gia đình, Bí ẩn</h5>
                <h5 class="h4 mt-3">{{$model['mo_ta']}} </h4>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Diễn viên:</h5>
                        <h5> {{$model['dien_vien']}} </h5>
                    </div>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Đạo diễn:</h5>
                        <h5> {{$model['dao_dien']}} </h5>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $model['episode'][0]['tap']]) }}" class="btn btn-light"
                           style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                            <h2 style="margin: 0; display: flex; align-items: center;color: black;">
                                <i class="fa-solid fa-play" style="margin-right: 10px;"></i>Phát
                            </h2>
                        </a>
                    </div>
            </div>
        </div>
        <div class="row mt-4">
            <h3>Danh sách tập phim: </h3>
            <div class="col-8">
                @foreach($model['episode'] as $data)
                    <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $data['tap']]) }}" class="btn btn-outline-danger">{{$data['tap']}}</a>
                @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <div class="col mb-4">
                <div id="tv" class="d-flex justify-content-between mb-3">
                    <h2>Có thể bạn sẽ thích</h2>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card">
                        <a href="#" class="nav-link">
                            <img src="img/61YLaenKRhABf4bNjHJxLBxW4JW.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

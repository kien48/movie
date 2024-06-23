@extends('layouts.master')
@section('title')
    Chi tiết phim
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row">
            <div class="col-3">
                <img src="{{$model['anh']}}" alt="" class="img-fluid" style="border-radius: 10px;width: 290px;height: 450px">
            </div>
            <div class="col-9">
                <h3 class="mb-3" style="font-weight: 700;font-size: 50px;">{{$model['ten']}} </h3>
                <h5 class="font-monospace text-light-emphasis mt-3">{{$model['chat_luong']}}  ● {{$model['ngon_ngu']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Số tập: {{$model['so_tap']}} | Hiện tại: {{$model['trang_thai']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Thể loại:
                @if(count($model['catelogue']) >=1)
                        @foreach($model['catelogue'] as $data)
                            {{$data['ten']}} *
                        @endforeach
                    @else
                    Đang cập nhật
                    @endif
                </h5>
                <h5 class="h4 mt-3" data-bs-toggle="tooltip" title="{{$model['mo_ta']}}!">{{substr($model['mo_ta'],0,500)}}... </h4>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Diễn viên:</h5>
                        <h5> {{$model['dien_vien']}} </h5>
                    </div>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Đạo diễn:</h5>
                        <h5> {{$model['dao_dien']}} </h5>
                    </div>
                   <div class="d-flex ">
                       @if(isset($model['episode'][0]))
                           <div class="mt-3">
                               <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $model['episode'][0]['tap']]) }}" class="btn btn-light"
                                  style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                   <h2 style="margin: 0; display: flex; align-items: center;color: black;">
                                       <i class="fa-solid fa-play" style="margin-right: 10px;"></i>
                                   </h2>
                               </a>
                           </div>
                       @else
                           <div class="mt-3">
                               <a href="#" class="btn btn-warning"
                                  style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                   <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                       <i class="fa-solid fa-screwdriver-wrench"></i>
                                   </h2>
                               </a>
                           </div>
                       @endif
                           @if($trangThai == false)
                               <div class="mt-3 ms-3">
                                   <form action="{{route('add')}}" method="post">
                                       @csrf
                                       <input name="id" type="hidden" value="{{$model['id']}}">
                                       <button type="submit" class="btn btn-outline-danger" style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                           <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                               <i class="fa-solid fa-heart"></i>
                                           </h2>
                                       </button>
                                   </form>
                               </div>
                               @else
                               <div class="mt-3 ms-3">
                                   <form action="{{route('remove')}}" method="post">
                                       @csrf
                                       <input name="id" type="hidden" value="{{$model['id']}}">
                                       <button type="submit" class="btn btn-danger" style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                           <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                               <i class="fa-solid fa-heart"></i>
                                           </h2>
                                       </button>
                                   </form>
                               </div>
                           @endif
                   </div>
            </div>
        </div>
        @if(isset($model['episode'][0]))
            <div class="row mt-4">
                <h3>Danh sách tập phim: </h3>
                <div class="col-8">
                    @foreach($model['episode'] as $data)
                        <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $data['tap']]) }}" class="btn btn-outline-danger" style="width: 45px;height: 40px">{{$data['tap']}}</a>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="row mb-5 mt-4">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between">
                    <h2>Bạn có thể sẽ thích</h2>
                </div>
                <div class="row">
                    @foreach($phimLienQuan as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{route('detail',$data['slug'])}}" class="nav-link" data-bs-toggle="tooltip" title="{{$data['ten']}}">
                                <img src="{{$data['anh']}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
